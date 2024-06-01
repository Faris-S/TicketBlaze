<?php

require '/backend/vendor/autoload.php';
require '/backend/rest/routes/middleware_routes.php';
require '/backend/rest/routes/tickets_routes.php';
require '/backend/rest/routes/faq_routes.php';
require '/backend/rest/routes/news_routes.php';
require '/backend/rest/routes/servicestatus_routes.php';
require '/backend/rest/routes/auth_routes.php';

Flight::start();