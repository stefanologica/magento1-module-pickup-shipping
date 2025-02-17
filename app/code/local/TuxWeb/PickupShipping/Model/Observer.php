<?php

class TuxWeb_PickupShipping_Model_Observer
{
    public function checkPickupAvailability(Varien_Event_Observer $observer)
    {
        $quote = $observer->getEvent()->getQuote();
        $shippingAddress = $quote->getShippingAddress();
        
        // Get the enabled provinces from configuration
        $enabledProvinces = Mage::getStoreConfig('pickupshipping/general/enabled_provinces');
        
        // Check if the shipping address province is in the enabled provinces
        if ($shippingAddress->getRegion() && !in_array($shippingAddress->getRegion(), explode(',', $enabledProvinces))) {
            // Remove pickup shipping method if not available for the province
            $shippingAddress->setCollectShippingRates(true);
            $shippingAddress->setShippingMethod('owebiashipping1'); // Fallback to  method owebiashipping1
        }
    }
}