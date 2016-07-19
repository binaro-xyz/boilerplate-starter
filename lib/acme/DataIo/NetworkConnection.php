<?php

namespace acme\DataIo;

use acme\Core\Application;

class NetworkConnection extends \boilerplate\DataIo\NetworkConnection {
    public static $user_agent_string = 'Boilerplate Starter/' . Application::VERSION_TEXT . ' (gzip; +https://example.org)';
}
