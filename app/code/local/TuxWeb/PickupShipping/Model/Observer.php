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

    public function filterShippingMethods($observer) {
        $quote = $observer->getEvent()->getQuote();
        $onlyPickup = false;

        foreach ($quote->getAllItems() as $item) {
            $product = $item->getProduct();
            if ($product->getOnlyPickup()) { // prendo l'attributo only_pickup
                $onlyPickup = true;
                break;
            }
        }

        if ($onlyPickup) {
            $shippingAddress = $quote->getShippingAddress();
            $rates = $shippingAddress->collectShippingRates()->getGroupedAllShippingRates();

            foreach ($rates as $carrier => $rateList) {
                foreach ($rateList as $rate) {
                    if ($rate->getCode() !== 'pickupshipping') { //codice metodo spedizione ritiro in sede
                        $shippingAddress->unsetShippingRate($rate->getCode());
                    }
                }
            }
        }
    }

    /**
     * Metodo per controllare l'ordine prima di confermarlo
     */
    public function validateOrder($observer)
    {
        $order = $observer->getEvent()->getOrder();
        $items = $order->getAllItems();
        $hasRestrictedProduct = false;

        foreach ($items as $item) {
            $product = Mage::getModel('catalog/product')->load($item->getProductId());
            if ($product->getData('only_pickup')) {
                $hasRestrictedProduct = true;
                break;
            }
        }

        if ($hasRestrictedProduct && $order->getShippingMethod() !== 'pickupshipping') {
            Mage::throwException("Il tuo ordine contiene prodotti disponibili solo per il ritiro in sede.");
        }
    }
}