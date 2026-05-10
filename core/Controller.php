<?php

class Controller
{
    public function view($view, $data = [])
    {
        extract($data);

        require_once '../app/views/' . $view . '.php';
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';

        return new $model;
    }

    public function formatTanggal($tanggal)
    {
        return date('d-m-Y', strtotime($tanggal));
    }
}
