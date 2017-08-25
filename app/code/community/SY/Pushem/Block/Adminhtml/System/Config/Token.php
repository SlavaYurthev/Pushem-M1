<?php
/**
 * Pushem
 * 
 * @author Slava Yurthev
 */
class SY_Pushem_Block_Adminhtml_System_Config_Token extends Mage_Adminhtml_Block_System_Config_Form_Field {
	protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element){
		$color = 'red';
		$value = (string)$element->getValue();
		if($value != ""){
			$element->setValue(Mage::helper('pushem')->__('Установлен'));
			$color = 'green';
		}
		else{
			$element->setValue(Mage::helper('pushem')->__('Отсутствует'));
		}
		return '<span style="color:'.$color.'">'.parent::_getElementHtml($element).'</span>';
	}
}