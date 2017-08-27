<?php
require_once __DIR__ . '/lib/base.php';

// Use this file to configure all your routes

\boilerplate\Core\Router::get('/', function() {
    return 'Welcome to Boilerplate!';
});
