<?php
class TuxWeb_PickupShipping_Model_System_Config_Source_Province
{
    /**
     * Recupera le province dalla tabella custom
     * Restituisce un array per il multiselect nel backend
     */
    public function toOptionArray()
    {
        $options = [];
        $collection = Mage::getModel('pickupshipping/province')->getCollection();

        foreach ($collection as $province) {
            $options[] = [
                'value' => $province->getProvinceCode(),
                'label' => $province->getProvinceLabel()
            ];
        }

        return $options;
    }
}
