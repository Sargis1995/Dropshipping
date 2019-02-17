<?php

class Dropshipping_Block_Form_Dropshipping extends Mage_Payment_Block_Form
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('dropshipping/form/dropshipping.phtml');
    }
    
    protected function dataForEmail()
    {
        $order = new Mage_Sales_Model_Order();
        $orderId = Mage::getSingleton('checkout/session')->getLastRealOrderId();
        $order->loadByIncrementId($orderId);
        if($order->getCustomerId()){
            $email = $order->getCustomerEmail(); //logged in customer
        }
        else{
            $email = $order->getBillingAddress()->getEmail(); //not logged in customer
        }
        
        return array('orderId'=>$orderId,'email'=>$email);
    }
}