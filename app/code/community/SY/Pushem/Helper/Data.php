<?php
/**
 * Pushem
 * 
 * @author Slava Yurthev
 */
class SY_Pushem_Helper_Data extends Mage_Core_Helper_Data {
	private $config;
	private $generalConfig;
	public function getConfig($key = false, $store = 0){
		if(!$this->config){
			$this->config = Mage::getStoreConfig('pushem', $store);
		}
		if($key != false){
			return @$this->config[$key];
		}
		return $this->config;
	}
	public function getGeneralConfig($key = false, $store = 0){
		if(!$this->generalConfig){
			$this->generalConfig = $this->getConfig('general', $store);
		}
		if($key != false){
			return @$this->generalConfig[$key];
		}
		return $this->generalConfig;
	}
	public function hasToken(){
		if((bool)$this->getGeneralConfig('api_token') !== false){
			return true;
		}
	}
}