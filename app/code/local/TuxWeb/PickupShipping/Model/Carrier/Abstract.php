<?php
/**
 * Copyright © 2008-2025 Tux Web Design. All rights reserved.
 * See COPYING.txt for license details.
 */

abstract class TuxWeb_PickupShipping_Model_Carrier_Abstract extends Mage_Shipping_Model_Carrier_Abstract
{
    protected $_config;
    protected $_isFixed = true;

    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        if (!$this->getConfigFlag('active')) {
            return false;
        }

        $result = Mage::getModel('shipping/rate_result');
        // Recupera i valori dal backend
        $methodTitle = Mage::getStoreConfig('carriers/pickupshipping/method_title');
        $shippingCost = Mage::getStoreConfig('carriers/pickupshipping/shipping_cost');
        $title = Mage::getStoreConfig('carriers/pickupshipping/title');
        $allowed_provinces = Mage::getStoreConfig('carriers/pickupshipping/allowed_provinces');

        // Check if the shipping method is enabled for the requested province
        $allowedProvinces = explode(',', $allowed_provinces);
        if (!in_array($request->getDestRegionCode(), $allowedProvinces)) {
            return false;
        }

        $method = Mage::getModel('shipping/rate_result_method');
        $method->setCarrier($this->_code);
        $method->setCarrierTitle($title);
        $method->setMethod($this->_code);
        $method->setMethodTitle($methodTitle);
        $method->setPrice($shippingCost);
        $method->setCost($shippingCost);

        $result->append($method);

        return $result;
    }

    public function getAllowedMethods()
    {
        $config = array($this->_code => Mage::getStoreConfig('carriers/pickupshipping/method_title'));
        $allowedMethods = array();
        if (count($config)>0) {
            foreach ($config as $row) {
                $allowedMethods[$row['*id']] = isset($row['label']) ? $row['label']['value'] : 'No label';
            }
        }
        return $allowedMethods;
    }

}
