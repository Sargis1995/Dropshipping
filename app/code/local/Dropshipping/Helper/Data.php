<?php
class Dropshipping_Helper_Data extends Mage_Core_Helper_Abstract {
    function getPaymentGatewayUrl()
    {
        return Mage::getUrl('dropshipping/payment/gateway', array('_secure' => false));
    }
}