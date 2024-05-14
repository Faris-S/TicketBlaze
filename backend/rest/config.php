<?php

// show error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_NOTICE | E_DEPRECATED);

define('DB_NAME', 'TicketBlaze');
define('DB_PORT', '3306');
define('DB_USER', 'user');
define('DB_PASSWORD', 'user123');
define('DB_HOST', '127.0.0.1');

define('JWT_SECRET', 'T1ck3tBl4z3');