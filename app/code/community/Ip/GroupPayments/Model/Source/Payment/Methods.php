<?php
class Ip_GroupPayments_Model_Source_Payment_Methods
{

    public function toOptionArray()
    {
        $payments = Mage::getSingleton('payment/config')->getActiveMethods();//getAllMethods
        $methods = array();
        foreach ($payments as $paymentCode=>$paymentModel) {
            $paymentTitle = Mage::getStoreConfig('payment/'.$paymentCode.'/title');
            $methods[$paymentCode] = array(
                'label'   => $paymentTitle,
                'value' => $paymentCode,
            );
        }
        return $methods;
    }

}