<?php
class Dropshipping_Model_Observer {

    public function filterpaymentmethod(Varien_Event_Observer $observer) {
        /* call get payment method */
        $method = $observer->getEvent()->getMethodInstance();

        /*   get  Quote  */
        $quote = $observer->getEvent()->getQuote();

        $result = $observer->getEvent()->getResult();

        /* Disable Your payment method for   adminStore */
        if($method->getCode()=='dropshipping' ){
            //Mage::helper('checkout/cart')->getSummaryCount()
            if(count($quote->getAllItems())>5){
                $result->isAvailable = false;
            }
        }
    }
}