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
        // Ottieni la quote (il carrello corrente)
        $quote = Mage::getSingleton('checkout/session')->getQuote();

        $restrictPickup = false;

        //Mage::helper('tuxweb_pickupshipping')->log('Ciao sono entrato nel mio filterShippingMethods');

        foreach ($quote->getAllItems() as $item) {
            $product = $item->getProduct();
            if (intval($product->getData('only_pickup')) == 1) {
                $restrictPickup = true;
                Mage::helper('tuxweb_pickupshipping')->log('RestrictPickup: ' . ($restrictPickup ? 'true' : 'false'));
                break;
            }
        }

        // Se esiste un prodotto con l'attributo "only_pickup", nascondi owebiashipping1
        if ($restrictPickup) {
            $shippingAddress = $quote->getShippingAddress();
            $shippingAddress->setCollectShippingRates(true)->collectShippingRates();
            $quote->save();

            $rates = $shippingAddress->getShippingRatesCollection();

            //Mage::helper('tuxweb_pickupshipping')->log('Shipping Address: ' . print_r($shippingAddress->debug(), true));
            Mage::helper('tuxweb_pickupshipping')->log('Shipping Rates: ' . print_r($rates->getData(), true));

            foreach ($rates as $rate) {
                Mage::helper('tuxweb_pickupshipping')->log('Lista dei metodi di spedizione: ' . print_r($rate->getCode(), true));
                if (strpos($rate->getCode(), 'owebiashipping1') !== false) {
                    $rates->removeItemByKey($rate->getId());
                    Mage::helper('tuxweb_pickupshipping')->log('Sto filtrando i metodi di spedizione. Metodo di spedizione nascosto: ' . $rate->getCode());

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

        $hasPickupProduct = false;
        Mage::helper('tuxweb_pickupshipping')->log('Valore iniziale di hasPickupProduct: ' . var_export($hasPickupProduct, true));

        foreach ($items as $item) {
            $product = Mage::getModel('catalog/product')->load($item->getProductId());
            Mage::helper('tuxweb_pickupshipping')->log('Prodotto: ' . $product->getName() . ' - only_pickup: ' . var_export($product->getData('only_pickup'), true));
            if (intval($product->getData('only_pickup')) == 1) {
                $hasPickupProduct = true;
                Mage::helper('tuxweb_pickupshipping')->log('Prodotto con only_pickup trovato!');
                break;
            }
        }

        // Se c'è un prodotto "only_pickup", accetta solo "pickupshipping" come metodo di spedizione
        if ($hasPickupProduct && strtolower($order->getShippingMethod()) !== 'pickupshipping_pickupshipping') {
            Mage::throwException("Puoi concludere l'ordine solo con il metodo di ritiro in sede. Il prodotto ". $product->getName() ." presente nel carrello è disponibile esclusivamente tramite il ritiro in sede.");
        }
        Mage::helper('tuxweb_pickupshipping')->log('Sto validando l\'ordine. Variabile hasPickupProduct = '.$hasPickupProduct);

    }

}