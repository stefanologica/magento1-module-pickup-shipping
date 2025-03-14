<?php

class TuxWeb_PickupShipping_Model_Observer
{
    public function checkPickupAvailability(Varien_Event_Observer $observer)
    {
        $quote = $observer->getEvent()->getQuote();
        $shippingAddress = $quote->getShippingAddress();
        
        // Get the enabled provinces from configuration
        $allowed_provinces = Mage::getStoreConfig('carriers/pickupshipping/allowed_provinces');
        
        // Check if the shipping address province is in the enabled provinces
        if ($shippingAddress->getRegionCode() && !in_array($shippingAddress->getRegionCode(), explode(',', $allowed_provinces))) {
            // Remove pickup shipping method if not available for the province
            $shippingAddress->setCollectShippingRates(true);
            $shippingAddress->setShippingMethod('owebiashipping1'); // Fallback to method owebiashipping1
        }
    }

    public function filterShippingMethods($observer)
    {
        $quote = $observer->getEvent()->getQuote();
        $shippingAddress = $quote->getShippingAddress();

        $onlyPickup = false;

        // Controlla se almeno un prodotto ha l'attributo "only_pickup" attivo
        foreach ($quote->getAllItems() as $item) {
            $product = Mage::getModel('catalog/product')->load($item->getProductId());
            if ($product->getOnlyPickup()) {
                $onlyPickup = true;
                break;
            }
        }

        // Se c'è almeno un prodotto con "only_pickup", rimuovi "owebiashipping1"
        if ($onlyPickup) {
            $rates = $shippingAddress->getGroupedAllShippingRates();

            foreach ($rates as $carrier => $rateList) {
                foreach ($rateList as $rate) {
                    if ($rate->getCode() === 'owebiashipping1') {
                        $shippingAddress->unsetShippingRate($rate->getCode());
                    }
                }
            }
        }

        Mage::helper('tuxweb_pickupshipping')->log('Sto filtrando i metodi di spedizione. Variabile onlyPickup = '.$onlyPickup);

    }


    /**
     * Metodo per controllare l'ordine prima di confermarlo
     */
    public function validateOrder($observer)
    {
        $order = $observer->getEvent()->getOrder();
        $items = $order->getAllItems();

        $hasPickupProduct = false;

        foreach ($items as $item) {
            $product = Mage::getModel('catalog/product')->load($item->getProductId());
            if ($product->getOnlyPickup()) {
                $hasPickupProduct = true;
                break;
            }
        }

        // Se c'è un prodotto "only_pickup", accetta solo "pickupshipping" come metodo di spedizione
        if ($hasPickupProduct && $order->getShippingMethod() !== 'pickupshipping') {
            Mage::throwException("Puoi concludere l'ordine solo con il metodo di ritiro in sede.");
        }
        Mage::helper('tuxweb_pickupshipping')->log('Sto validando l\'ordine. Variabile hasPickupProduct = '.$hasPickupProduct);

    }

}