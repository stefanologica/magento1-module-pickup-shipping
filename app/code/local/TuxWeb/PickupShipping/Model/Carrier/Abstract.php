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

        // Check if the shipping method is enabled for the requested province
        $allowedProvinces = explode(',', $this->getConfigData('allowed_provinces'));
        if (!in_array($request->getDestRegion(), $allowedProvinces)) {
            return false;
        }

        // Define the fixed shipping rate
        $shippingCost = $this->getConfigData('shipping_cost');

        $method = Mage::getModel('shipping/rate_result_method');
        $method->setCarrier($this->_code);
        $method->setCarrierTitle($this->getConfigData('title'));
        $method->setMethod($this->_code);
        $method->setMethodTitle($this->getConfigData('method_title'));
        $method->setPrice($shippingCost);
        $method->setCost($shippingCost);

        $result->append($method);

        return $result;
    }

    public function getAllowedMethods()
    {
        $config = array($this->_code => $this->getConfigData('method_title'));
        $allowedMethods = array();
        if (count($config)>0) {
            foreach ($config as $row) {
                $allowedMethods[$row['*id']] = isset($row['label']) ? $row['label']['value'] : 'No label';
            }
        }
        return $allowedMethods;
    }

}
