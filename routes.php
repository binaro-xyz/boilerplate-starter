<?php
require_once __DIR__ . '/lib/base.php';

// Use this file to configure all your routes. Here are some examples of how you can configure routes.

\boilerplate\Core\Router::get('/', function() {
    return 'Welcome to Boilerplate!';
}, 'home');

\boilerplate\Core\Router::get('hello/{name}', 'helloAction');

\boilerplate\Core\Router::get('bye/{name}', function($name) {
    return view('demo/bye.html', array('name' => $name));
}, 'bye');

\boilerplate\Core\Router::setControllerNamespace('\\acme\\Controller\\');
\boilerplate\Core\Router::get('/controller/{input}', 'DemoController@demoAction');

function helloAction($name) {
    return 'Hi there, ' . $name . '!
<br>Say <a href="' . route('bye', array('name' => $name)) . '">bye</a>.';
}
