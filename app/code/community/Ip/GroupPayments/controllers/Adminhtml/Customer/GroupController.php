<?php

include_once("Mage/Adminhtml/controllers/Customer/GroupController.php");
class Ip_GroupPayments_Adminhtml_Customer_GroupController extends Mage_Adminhtml_Customer_GroupController
{
    /**
     * Create or save customer group.
     */
    public function saveAction()
    {
        $customerGroup = Mage::getModel('customer/group');
        $id = $this->getRequest()->getParam('id');
        if (!is_null($id)) {
            $customerGroup->load((int)$id);
        }
        $approved_methods = implode(',',$this->getRequest()->getParam('approved_methods'));
        $customerGroup->setApprovedMethods($approved_methods)->save();
        parent::saveAction();
    }

}