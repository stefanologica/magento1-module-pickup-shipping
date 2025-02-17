# README for Pickup Shipping Module

## Overview

This module implements a fixed-rate shipping method for in-store pickup in Magento 1.9. It allows store owners to enable this shipping method only for specific provinces, providing flexibility in shipping options.

## Features

- Fixed-rate shipping for in-store pickup.
- Configuration options to enable the shipping method.
- Ability to specify which provinces the shipping method is available for.
- Translation String for following locale: de_DE, en_US, es_ES, fr_FR, it_IT

## Installation Instructions

1. **Download the Module**: Clone or download the module files into your Magento installation.
2. **Place the Files**: Copy the `TuxWeb` folder into `app/code/local/`.
3. **Enable the Module**: Ensure the module is enabled by checking the `app/etc/modules/TuxWeb_PickupShipping.xml` file.
4. **Clear Cache**: Clear the Magento cache from the admin panel or by deleting the contents of the `var/cache` directory.
5. **Configure the Module**:
   - Log in to the Magento admin panel.
   - Navigate to `System > Configuration > Shipping Methods`.
   - Find the "Pickup Shipping" section to configure the settings.

## Usage Guidelines

- After installation, the "Pickup Shipping" method will appear during checkout if the customer's shipping address matches the enabled provinces.
- Admins can manage the provinces in the configuration settings.

## Support

For any issues or questions, please contact [Tux Web Support](mailto:info@tuxwebdesign.it).

## License

This module is licensed under the MIT Licence. Please refer to the license file for more details.