<?php

namespace acme\Core;

use acme\DataIo\DatabaseConnection;

class Application extends \boilerplate\Core\Application {
    const VERSION_TEXT = '1.0.0';
    const VERSION_CODE = 1;

    public function __construct() {
        parent::__construct();
        $this->db_con = new DatabaseConnection();
        $this->config = new Configuration(true, $this->db_con);
    }
}