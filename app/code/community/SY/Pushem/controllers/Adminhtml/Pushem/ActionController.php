<?php
/**
 * Pushem
 * 
 * @author Slava Yurthev
 */
class SY_Pushem_Adminhtml_Pushem_ActionController extends Mage_Adminhtml_Controller_Action
{
	public function panelAction(){
		$this->_redirectUrl('https://pushem.ru/user/notifications/#send_notinfication');
	}
}