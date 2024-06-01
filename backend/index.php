<?php

require 'vendor/autoload.php';
require 'rest/routes/middleware_routes.php';
require 'rest/routes/tickets_routes.php';
require 'rest/routes/faq_routes.php';
require 'rest/routes/news_routes.php';
require 'rest/routes/servicestatus_routes.php';
require 'rest/routes/auth_routes.php';

Flight::start();