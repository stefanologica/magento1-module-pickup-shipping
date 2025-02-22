<?php
$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('pickupshipping/province'))
    ->addColumn('province_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, ['identity' => true, 'nullable' => false, 'primary' => true], 'Province ID')
    ->addColumn('province_code', Varien_Db_Ddl_Table::TYPE_TEXT, 255, ['nullable' => false], 'Province Code')
    ->addColumn('province_label', Varien_Db_Ddl_Table::TYPE_TEXT, 255, ['nullable' => false], 'Province Label')
    ->addColumn('is_enabled', Varien_Db_Ddl_Table::TYPE_BOOLEAN, null, ['nullable' => false, 'default' => 0], 'Is Enabled')
    ->setComment('Pickup Shipping Provinces Table');

$installer->getConnection()->createTable($table);

$installer->endSetup();