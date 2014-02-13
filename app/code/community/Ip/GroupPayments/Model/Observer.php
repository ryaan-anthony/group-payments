<?php

class Ip_GroupPayments_Model_Observer
{

    function isAvailable(Varien_Event_Observer $observer)
    {
        $result = $observer->getEvent()->getResult();
        $method = $observer->getEvent()->getMethodInstance();
        //$quote = $observer->getEvent()->getQuote();
        if($result->isAvailable){
            $groupId = Mage::getSingleton('customer/session')->getCustomerGroupId();
            $group = Mage::getModel('customer/group')->load($groupId);
            $approved_methods = explode(',',$group->getApprovedMethods());
            if(!in_array($method->getCode(), $approved_methods)){
                $result->isAvailable = false;
            }
        }
    }


}