<?php

namespace acme\Core;

use acme\DataIo\DatabaseConnection;
use Monolog\Handler\BrowserConsoleHandler;
use Monolog\Logger;

class Application extends \boilerplate\Core\Application {
    const VERSION_TEXT = '1.0.0';
    const VERSION_CODE = 1;

    public function __construct() {
        parent::__construct();
        $this->config = new Configuration(true, $this->db_con);
        $this->logger = &\boilerplate\Core\Application::instance()->logger;
        $this->logger->pushHandler(new BrowserConsoleHandler());
    }
}
