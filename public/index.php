<?php

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
define('CONFIG', APP . 'Config' . DIRECTORY_SEPARATOR);
require CONFIG . 'autoload.php';
$app = new App\Core\Application();