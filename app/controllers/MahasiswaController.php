<?php

class MahasiswaController extends Controller
{
    public function index()
    {
        $model = $this->model('Mahasiswa');

        $data['mahasiswa'] = $model->getAll();

        $this->view('mahasiswa/index', $data);
    }
}
