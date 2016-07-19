<?php

namespace acme\Core;

class ConfigurationOption extends \boilerplate\Core\ConfigurationOption {
    const DEMO_INI_PROPERTY = array('property' => 'demo_ini_property', 'source' => 'ini');

    const DEMO_DB_PROPERTY = array('property' => 'demo_db_property', 'source' => 'db');
}

class Configuration extends \boilerplate\Core\Configuration {

}
