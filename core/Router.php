<?php

class Router {

    private $controller = 'HomeController';
    private $method = 'index';
    private $params = [];

    // mengambil URL
    public function parseURL() {

        if (isset($_GET['url'])) {

            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }

        return [];
    }

    // menjalankan routing
    public function run() {

        $url = $this->parseURL();

        // =========================
        // CEK CONTROLLER
        // =========================
        if (isset($url[0]) && $url[0] != '') {

            $controllerName = ucfirst($url[0]) . 'Controller';
            $controllerFile = '../app/controllers/' . $controllerName . '.php';

            if (file_exists($controllerFile)) {

                require_once $controllerFile;
                $this->controller = $controllerName;

                unset($url[0]);

            } else {

                $this->error404();
                return;
            }
        } else {

            require_once '../app/controllers/HomeController.php';
        }

        // object controller
        $this->controller = new $this->controller;

        // =========================
        // CEK METHOD
        // =========================
        if (isset($url[1])) {

            if (method_exists($this->controller, $url[1])) {

                $this->method = $url[1];
                unset($url[1]);

            } else {

                $this->error404();
                return;
            }
        }

        // =========================
        // PARAMETER
        // =========================
        $this->params = $url ? array_values($url) : [];

        // jalankan controller + method
        call_user_func_array(
            [$this->controller, $this->method],
            $this->params
        );
    }

    // error sederhana
    public function error404() {

        echo "<h1>404 - Halaman Tidak Ditemukan</h1>";
    }
}