<?php

use App\Routes\Route;

if (!isset($_SESSION)) session_start();
require_once "../vendor/autoload.php";
require_once "helper.php";


define("APP_ROOT", realpath(__DIR__ . "/../"));

define("SITE_URL", 'http://localhost/MVC/public/');

define("DB_HOST", "localhost");
define("DB_NAME", "mario");
define("DB_USER", "root");
define("DB_PASS", "");

$route =new Route();
