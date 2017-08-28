<?php
require_once __DIR__ . '/lib/base.php';

// Use this file to configure all your routes

\boilerplate\Core\Router::get('/', function() {
    return 'Welcome to Boilerplate!';
}, 'home');

\boilerplate\Core\Router::get('hello/{name}', function($name) {
    return 'Hi there, ' . $name . '!
    <br>Say <a href="' . route('bye', array('name' => $name)) . '">bye</a>.';
});

\boilerplate\Core\Router::get('bye/{name}', function($name) {
    return view('demo/bye.html', array('name' => $name));
}, 'bye');
