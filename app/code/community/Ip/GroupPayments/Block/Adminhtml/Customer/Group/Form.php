<?php

class Ip_GroupPayments_Block_Adminhtml_Customer_Group_Form extends Mage_Adminhtml_Block_Customer_Group_Edit_Form
{

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $customerGroup = Mage::registry('current_group');
        $form = $this->getForm();
        $elements = $form->getElements();
        foreach($elements as $fieldset){
            if($fieldset->getId() == 'base_fieldset'){
                $fieldset->addField('approved_methods', 'multiselect',
                    array(
                        'name'  => 'approved_methods',
                        'label' => Mage::helper('customer')->__('Approved Payment Methods'),
                        'title' => Mage::helper('customer')->__('Approved Payment Methods'),
                        'class' => '',
                        'required' => false,
                        'values' => Mage::getSingleton('groupPayments/source_payment_methods')->toOptionArray()
                    )
                );
                if( Mage::getSingleton('adminhtml/session')->getCustomerGroupData() ) {
                    $form->addValues(Mage::getSingleton('adminhtml/session')->getCustomerGroupData());
                    Mage::getSingleton('adminhtml/session')->setCustomerGroupData(null);
                } else {
                    $form->addValues($customerGroup->getData());
                }
            }
        }
    }

}