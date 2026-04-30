<?php

// BASE URL
define('BASEURL', 'http://localhost/mvc_mahasiswa/public');

// koneksi database
require_once '../config/database.php';

// ambil url
$url = isset($_GET['url']) ? $_GET['url'] : '';
$url = trim($url, '/');
$url = explode('/', $url);

// controller
$controllerName = !empty($url[0]) ? ucfirst($url[0]) : 'Mahasiswa';
$controllerFile = '../app/controllers/' . $controllerName . '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controller = new $controllerName;
} else {
    die('Controller tidak ditemukan!');
}

// method
$method = isset($url[1]) ? $url[1] : 'index';

if (method_exists($controller, $method)) {
    $params = array_slice($url, 2);
    call_user_func_array([$controller, $method], $params);
} else {
    die('Method tidak ditemukan!');
}