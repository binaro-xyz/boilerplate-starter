<?php

namespace acme\Controller;

class DemoController {
    private $var;

    public function __construct() {
        $this->var = date('c');
    }

    public function demoAction($input) {
        return 'I am a controller action! You entered: ' . $input . '<br>My constructor was accessed at: ' . $this->var;
    }
}
