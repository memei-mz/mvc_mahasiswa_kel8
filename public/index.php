<?php

// BASE URL
define('BASEURL', 'http://localhost/mvc_mahasiswa/public');

// memanggil file core
require_once '../core/Controller.php';
require_once '../core/Router.php';
require_once '../core/Database.php';

// menjalankan router
$router = new Router();
$router->run();