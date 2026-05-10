<?php

class Controller {

    // memuat view
    public function view($view, $data = []) {

        extract($data);

        require_once '../app/views/' . $view . '.php';
    }

    // memuat model
    public function model($model) {

        require_once '../app/models/' . $model . '.php';

        return new $model;
    }
}