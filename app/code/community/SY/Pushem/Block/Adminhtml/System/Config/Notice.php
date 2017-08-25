<?php
/**
 * Pushem
 * 
 * @author Slava Yurthev
 */
class SY_Pushem_Block_Adminhtml_System_Config_Notice extends Mage_Adminhtml_Block_System_Config_Form_Field {
	protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element){
		$helper = Mage::helper('pushem');
		$url = '<a href="https://pushem.ru/user/dashboard" target="_blank">'.$helper->__('по этой ссылке').'</a>';
		if($helper->hasToken()){
			$notice = $helper ->__('Войдите на сайт %s, чтобы управлять', $url);
		}
		else{
			$notice = $helper ->__('Для подключения создайте аккаунт %s', $url);
		}
		return $notice;
	}
}