<?php
class TuxWeb_PickupShipping_Model_Resource_Setup extends Mage_Core_Model_Resource_Setup {
    public function installDefaultProvinces() {
        $table = $this->getTable('pickupshipping/province');
        $data = [
            ['province_code' => 'AG', 'province_label' => 'Agrigento', 'is_enabled' => 1],
            ['province_code' => 'AL', 'province_label' => 'Alessandria', 'is_enabled' => 1],
            ['province_code' => 'AN', 'province_label' => 'Ancona', 'is_enabled' => 1],
            ['province_code' => 'AO', 'province_label' => 'Aosta', 'is_enabled' => 1],
            ['province_code' => 'AR', 'province_label' => 'Arezzo', 'is_enabled' => 1],
            ['province_code' => 'AP', 'province_label' => 'Ascoli Piceno', 'is_enabled' => 1],
            ['province_code' => 'AT', 'province_label' => 'Asti', 'is_enabled' => 1],
            ['province_code' => 'AV', 'province_label' => 'Avellino', 'is_enabled' => 1],
            ['province_code' => 'BA', 'province_label' => 'Bari', 'is_enabled' => 1],
            ['province_code' => 'BT', 'province_label' => 'Barletta-Andria-Trani', 'is_enabled' => 1],
            ['province_code' => 'BL', 'province_label' => 'Belluno', 'is_enabled' => 1],
            ['province_code' => 'BN', 'province_label' => 'Benevento', 'is_enabled' => 1],
            ['province_code' => 'BG', 'province_label' => 'Bergamo', 'is_enabled' => 1],
            ['province_code' => 'BI', 'province_label' => 'Biella', 'is_enabled' => 1],
            ['province_code' => 'BO', 'province_label' => 'Bologna', 'is_enabled' => 1],
            ['province_code' => 'BZ', 'province_label' => 'Bolzano', 'is_enabled' => 1],
            ['province_code' => 'BS', 'province_label' => 'Brescia', 'is_enabled' => 1],
            ['province_code' => 'BR', 'province_label' => 'Brindisi', 'is_enabled' => 1],
            ['province_code' => 'CA', 'province_label' => 'Cagliari', 'is_enabled' => 1],
            ['province_code' => 'CL', 'province_label' => 'Caltanissetta', 'is_enabled' => 1],
            ['province_code' => 'CB', 'province_label' => 'Campobasso', 'is_enabled' => 1],
            ['province_code' => 'CI', 'province_label' => 'Carbonia-Iglesias', 'is_enabled' => 1],
            ['province_code' => 'CE', 'province_label' => 'Caserta', 'is_enabled' => 1],
            ['province_code' => 'CT', 'province_label' => 'Catania', 'is_enabled' => 1],
            ['province_code' => 'CZ', 'province_label' => 'Catanzaro', 'is_enabled' => 1],
            ['province_code' => 'CH', 'province_label' => 'Chieti', 'is_enabled' => 1],
            ['province_code' => 'CO', 'province_label' => 'Como', 'is_enabled' => 1],
            ['province_code' => 'CS', 'province_label' => 'Cosenza', 'is_enabled' => 1],
            ['province_code' => 'CR', 'province_label' => 'Cremona', 'is_enabled' => 1],
            ['province_code' => 'KR', 'province_label' => 'Crotone', 'is_enabled' => 1],
            ['province_code' => 'CN', 'province_label' => 'Cuneo', 'is_enabled' => 1],
            ['province_code' => 'EN', 'province_label' => 'Enna', 'is_enabled' => 1],
            ['province_code' => 'FM', 'province_label' => 'Fermo', 'is_enabled' => 1],
            ['province_code' => 'FE', 'province_label' => 'Ferrara', 'is_enabled' => 1],
            ['province_code' => 'FI', 'province_label' => 'Firenze', 'is_enabled' => 1],
            ['province_code' => 'FG', 'province_label' => 'Foggia', 'is_enabled' => 1],
            ['province_code' => 'FC', 'province_label' => 'Forlì-Cesena', 'is_enabled' => 1],
            ['province_code' => 'FR', 'province_label' => 'Frosinone', 'is_enabled' => 1],
            ['province_code' => 'GE', 'province_label' => 'Genova', 'is_enabled' => 1],
            ['province_code' => 'GO', 'province_label' => 'Gorizia', 'is_enabled' => 1],
            ['province_code' => 'GR', 'province_label' => 'Grosseto', 'is_enabled' => 1],
            ['province_code' => 'IM', 'province_label' => 'Imperia', 'is_enabled' => 1],
            ['province_code' => 'IS', 'province_label' => 'Isernia', 'is_enabled' => 1],
            ['province_code' => 'SP', 'province_label' => 'La Spezia', 'is_enabled' => 1],
            ['province_code' => 'AQ', 'province_label' => 'L\'Aquila', 'is_enabled' => 1],
            ['province_code' => 'LT', 'province_label' => 'Latina', 'is_enabled' => 1],
            ['province_code' => 'LE', 'province_label' => 'Lecce', 'is_enabled' => 1],
            ['province_code' => 'LC', 'province_label' => 'Lecco', 'is_enabled' => 1],
            ['province_code' => 'LI', 'province_label' => 'Livorno', 'is_enabled' => 1],
            ['province_code' => 'LO', 'province_label' => 'Lodi', 'is_enabled' => 1],
            ['province_code' => 'LU', 'province_label' => 'Lucca', 'is_enabled' => 1],
            ['province_code' => 'MC', 'province_label' => 'Macerata', 'is_enabled' => 1],
            ['province_code' => 'MN', 'province_label' => 'Mantova', 'is_enabled' => 1],
            ['province_code' => 'MS', 'province_label' => 'Massa-Carrara', 'is_enabled' => 1],
            ['province_code' => 'MT', 'province_label' => 'Matera', 'is_enabled' => 1],
            ['province_code' => 'ME', 'province_label' => 'Messina', 'is_enabled' => 1],
            ['province_code' => 'MI', 'province_label' => 'Milano', 'is_enabled' => 1],
            ['province_code' => 'MO', 'province_label' => 'Modena', 'is_enabled' => 1],
            ['province_code' => 'MB', 'province_label' => 'Monza e Brianza', 'is_enabled' => 1],
            ['province_code' => 'NA', 'province_label' => 'Napoli', 'is_enabled' => 1],
            ['province_code' => 'NO', 'province_label' => 'Novara', 'is_enabled' => 1],
            ['province_code' => 'NU', 'province_label' => 'Nuoro', 'is_enabled' => 1],
            ['province_code' => 'OR', 'province_label' => 'Oristano', 'is_enabled' => 1],
            ['province_code' => 'PD', 'province_label' => 'Padova', 'is_enabled' => 1],
            ['province_code' => 'PA', 'province_label' => 'Palermo', 'is_enabled' => 1],
            ['province_code' => 'PR', 'province_label' => 'Parma', 'is_enabled' => 1],
            ['province_code' => 'PV', 'province_label' => 'Pavia', 'is_enabled' => 1],
            ['province_code' => 'PG', 'province_label' => 'Perugia', 'is_enabled' => 1],
            ['province_code' => 'PU', 'province_label' => 'Pesaro e Urbino', 'is_enabled' => 1],
            ['province_code' => 'PE', 'province_label' => 'Pescara', 'is_enabled' => 1],
            ['province_code' => 'PC', 'province_label' => 'Piacenza', 'is_enabled' => 1],
            ['province_code' => 'PI', 'province_label' => 'Pisa', 'is_enabled' => 1],
            ['province_code' => 'PT', 'province_label' => 'Pistoia', 'is_enabled' => 1],
            ['province_code' => 'PN', 'province_label' => 'Pordenone', 'is_enabled' => 1],
            ['province_code' => 'PZ', 'province_label' => 'Potenza', 'is_enabled' => 1],
            ['province_code' => 'PO', 'province_label' => 'Prato', 'is_enabled' => 1],
            ['province_code' => 'RG', 'province_label' => 'Ragusa', 'is_enabled' => 1],
            ['province_code' => 'RA', 'province_label' => 'Ravenna', 'is_enabled' => 1],
            ['province_code' => 'RC', 'province_label' => 'Reggio Calabria', 'is_enabled' => 1],
            ['province_code' => 'RE', 'province_label' => 'Reggio Emilia', 'is_enabled' => 1],
            ['province_code' => 'RI', 'province_label' => 'Rieti', 'is_enabled' => 1],
            ['province_code' => 'RN', 'province_label' => 'Rimini', 'is_enabled' => 1],
            ['province_code' => 'RM', 'province_label' => 'Roma', 'is_enabled' => 1],
            ['province_code' => 'RO', 'province_label' => 'Rovigo', 'is_enabled' => 1],
            ['province_code' => 'SA', 'province_label' => 'Salerno', 'is_enabled' => 1],
            ['province_code' => 'SS', 'province_label' => 'Sassari', 'is_enabled' => 1],
            ['province_code' => 'SV', 'province_label' => 'Savona', 'is_enabled' => 1],
            ['province_code' => 'SI', 'province_label' => 'Siena', 'is_enabled' => 1],
            ['province_code' => 'SR', 'province_label' => 'Siracusa', 'is_enabled' => 1],
            ['province_code' => 'SO', 'province_label' => 'Sondrio', 'is_enabled' => 1],
            ['province_code' => 'SU', 'province_label' => 'Sud Sardegna', 'is_enabled' => 1],
            ['province_code' => 'TA', 'province_label' => 'Taranto', 'is_enabled' => 1],
            ['province_code' => 'TE', 'province_label' => 'Teramo', 'is_enabled' => 1],
            ['province_code' => 'TR', 'province_label' => 'Terni', 'is_enabled' => 1],
            ['province_code' => 'TO', 'province_label' => 'Torino', 'is_enabled' => 1],
            ['province_code' => 'TP', 'province_label' => 'Trapani', 'is_enabled' => 1],
            ['province_code' => 'TN', 'province_label' => 'Trento', 'is_enabled' => 1],
            ['province_code' => 'TV', 'province_label' => 'Treviso', 'is_enabled' => 1],
            ['province_code' => 'TS', 'province_label' => 'Trieste', 'is_enabled' => 1],
            ['province_code' => 'UD', 'province_label' => 'Udine', 'is_enabled' => 1],
            ['province_code' => 'VA', 'province_label' => 'Varese', 'is_enabled' => 1],
            ['province_code' => 'VE', 'province_label' => 'Venezia', 'is_enabled' => 1],
            ['province_code' => 'VB', 'province_label' => 'Verbano-Cusio-Ossola', 'is_enabled' => 1],
            ['province_code' => 'VC', 'province_label' => 'Vercelli', 'is_enabled' => 1],
            ['province_code' => 'VR', 'province_label' => 'Verona', 'is_enabled' => 1],
            ['province_code' => 'VV', 'province_label' => 'Vibo Valentia', 'is_enabled' => 1],
            ['province_code' => 'VI', 'province_label' => 'Vicenza', 'is_enabled' => 1],
            ['province_code' => 'VT', 'province_label' => 'Viterbo', 'is_enabled' => 1],
        ];
                
        foreach ($data as $row) {
            $this->getConnection()->insert($table, $row);
        }
    }
}