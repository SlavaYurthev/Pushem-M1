<?php
/**
 * Pushem
 * 
 * @author Slava Yurthev
 */
class SY_Pushem_Block_Head_Script extends Mage_Core_Block_Template {
	public $_template = 'SY/pushem/head/script.phtml';
	private $_helper;
	private $_segments;
	private $_session;
	public function __construct(){
		$this->_helper = Mage::helper('pushem');
		$this->_session = Mage::getSingleton('customer/session');
		parent::__construct();
	}
	public function getToken(){
		return $this->_helper->getGeneralConfig('api_token');
	}
	public function getSegments(){
		if(!$this->_segments){
			$this->_segments = $this->_helper->getGeneralConfig('segments');
		}
		return $this->_segments;
	}
	public function hasSegments(){
		if(!$this->_segments){
			$this->_segments = $this->_helper->getGeneralConfig('segments');
		}
		if((bool)$this->_segments !== false){
			return true;
		}
	}
	public function getCustomer(){
		return $this->_session;
	}
}