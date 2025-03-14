<?php
class TuxWeb_PickupShipping_Model_Resource_Province extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('tuxweb_pickupshipping/province', 'province_id');
    }
}
