<?php
/**
 * Helper class for the PickupShipping extension.
 *
 * @category  TuxWeb
 * @package   TuxWeb_PickupShipping
 * @author    Stefano Tusino <webmaster@tuxwebdesign.it>
 * @copyright Copyright (c) 2025 Stefano Tux (https://github.com/stefanologica)
 * @license   http://www.gnu.org/licenses/gpl-3.0.html
 */

class TuxWeb_PickupShipping_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_PATH_PICKUPSHIPPING_ENABLED = 'pickupshipping/general/enabled';
    const XML_PATH_PICKUPSHIPPING_LOGGING = 'pickupshipping/general/logging';

    /**
     * Log file name.
     *
     * @var str
     */
    protected $_logFile = 'tuxweb_pickupshipping.log';

    /**
     * Writes extension messages to the log file.
     *
     * @param str $message
     */
    public function log($message)
    {
        if (Mage::getStoreConfig(self::XML_PATH_PICKUPSHIPPING_LOGGING)) {
            Mage::log($message, null, $this->_logFile);
        }
    }

    /**
     * Checks if extension is enabled in the system configuration.
     *
     * @return bool
     */
    public function isEnabled()
    {
        return Mage::getStoreConfig(self::XML_PATH_PICKUPSHIPPING_ENABLED);
    }
}
