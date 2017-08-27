<?php
require_once __DIR__ . '/lib/base.php';

// Create an an instance of the Application
\acme\Core\Application::instance();

include_once \acme\Core\Application::ROOT_DIR . '/routes.php';

\boilerplate\Core\Router::handle();
