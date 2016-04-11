<?php

session_name('SESSID');
session_start();

header("Content-type: text/html; charset=UTF-8", true);

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

define('UPLOAD_DIR', dirname(__DIR__) . '/upload');

$loader = require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';
try {
    $Router = new Router();
    $Router->run();
} catch (\Exception $e) {
    echo $e->getMessage();
}
?>