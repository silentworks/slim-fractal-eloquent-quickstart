<?php
define('ENVIRONMENT', isset($_SERVER['ENV']) ? $_SERVER['ENV'] : 'local');

require 'vendor/autoload.php';

$config = require_once "config/slim.php";
$app = new Slim\App($config);

App::setup($app);

/* Include routes */
require_once "config/routes.php";
require_once "config/extend.php";

return $app;
