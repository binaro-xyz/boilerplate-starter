<?php
require_once __DIR__ . '/../lib/base.php';

// Create an an instance of the Application
\acme\Core\Application::instance();

// Use the routes.php file to configure your routes
include_once \acme\Core\Application::ROOT_DIR . '/routes.php';

// Instruct the router to handle this request
\boilerplate\Core\Router::handle();
