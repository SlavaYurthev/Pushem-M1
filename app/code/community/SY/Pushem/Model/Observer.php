<?php
/**
 * Pushem
 * 
 * @author Slava Yurthev
 */
class SY_Pushem_Model_Observer {
	public function configChanged($observer){
		$event = $observer->getEvent();
		$website = $event->getData('website');
		$store = $event->getData('store');
		$session = Mage::getSingleton('adminhtml/session');
		$config = Mage::getStoreConfig('pushem/general');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://pushem.ru/openapi/account/get/?id='.@$config['id'].'&key='.@$config['api_key']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = Zend_Json::decode(curl_exec($ch));
		curl_close($ch);
		if(@$response['status'] == "1"){
			Mage::getConfig()->saveConfig('pushem/general/api_token', @$response['token'], 'default', 0);
		}
		else{
			Mage::getConfig()->saveConfig('pushem/general/api_token', false, 'default', 0);
			$session->addError(
					Mage::helper('pushem')->__('Данные не могут быть получены, ваш аккаунт заблокирован, узнайте подробности в панели управления по адресу <a href="https://pushem.ru/user/dashboard" target="_blank">https://pushem.ru/user/dashboard</a>')
				);
		}
		Mage::getConfig()->reinit();
		Mage::app()->reinitStores();
	}
	public function appendJs($observer){
		$helper = Mage::helper('pushem');
		if($helper->getGeneralConfig('active') == "1" && $helper->hasToken()){
			$block = $observer->getBlock();
			if($block instanceof Mage_Page_Block_Html_Head){
				$transport = $observer->getTransport();
				$html = $transport->getHtml();
				$script = Mage::app()->getLayout()->getBlockSingleton('pushem/head_script');
				$html .= $script->toHtml();
				$transport->setHtml($html);
			}
		}
	}
}