<?php

class MahasiswaController extends Controller
{
    public function index()
    {
        $model = $this->model('Mahasiswa');

        $search = $_GET['search'] ?? '';
        $jurusan = $_GET['jurusan'] ?? '';

        if (!empty($search) || !empty($jurusan)) {

            $data['mahasiswa'] = $model->searchAndFilter($search, $jurusan);
        } else {

            $data['mahasiswa'] = $model->getAll();
        }

        $data['search'] = $search;
        $data['jurusan'] = $jurusan;

        $this->view('mahasiswa/index', $data);
    }

    public function create()
    {
        $this->view('mahasiswa/create');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $model = $this->model('Mahasiswa');

            $npm = trim($_POST['npm']);
            $nama = trim($_POST['nama']);
            $fakultas = trim($_POST['fakultas']);
            $jurusan = trim($_POST['jurusan']);
            $tempat_lahir = trim($_POST['tempat_lahir']);
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $jenis_kelamin = $_POST['jenis_kelamin'];

            if (empty($npm) || empty($nama)) {

                $this->setFlash('NPM dan Nama wajib diisi', 'danger');

                header('Location: ' . BASEURL . '/mahasiswa/create');
                exit;
            }

            if ($model->checkNpm($npm)) {

                $this->setFlash('NPM sudah digunakan', 'danger');

                header('Location: ' . BASEURL . '/mahasiswa/create');
                exit;
            }

            if (!in_array($jurusan, ['Teknik Informatika', 'Sistem Informasi'])) {

                $this->setFlash('Jurusan tidak valid', 'danger');

                header('Location: ' . BASEURL . '/mahasiswa/create');
                exit;
            }

            if (!in_array($jenis_kelamin, ['Laki-laki', 'Perempuan'])) {

                $this->setFlash('Jenis kelamin tidak valid', 'danger');

                header('Location: ' . BASEURL . '/mahasiswa/create');
                exit;
            }

            $data = [
                'npm' => $npm,
                'nama' => $nama,
                'fakultas' => $fakultas,
                'jurusan' => $jurusan,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin
            ];

            if ($model->create($data)) {

                $this->setFlash('Data mahasiswa berhasil ditambahkan', 'success');

                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            } else {

                $this->setFlash('Gagal menambahkan data', 'danger');

                header('Location: ' . BASEURL . '/mahasiswa/create');
                exit;
            }
        }
    }

    public function edit($id)
    {
        $model = $this->model('Mahasiswa');

        $data['mahasiswa'] = $model->find($id);

        if (!$data['mahasiswa']) {

            $this->setFlash('Data tidak ditemukan', 'danger');

            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }

        $this->view('mahasiswa/edit', $data);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $model = $this->model('Mahasiswa');

            $data = [
                'npm' => trim($_POST['npm']),
                'nama' => trim($_POST['nama']),
                'fakultas' => trim($_POST['fakultas']),
                'jurusan' => trim($_POST['jurusan']),
                'tempat_lahir' => trim($_POST['tempat_lahir']),
                'tanggal_lahir' => $_POST['tanggal_lahir'],
                'jenis_kelamin' => $_POST['jenis_kelamin']
            ];

            if ($model->update($id, $data)) {

                $this->setFlash('Data berhasil diupdate', 'success');
            } else {

                $this->setFlash('Gagal update data', 'danger');
            }

            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function delete($id)
    {
        $model = $this->model('Mahasiswa');

        if ($model->delete($id)) {

            $this->setFlash('Data berhasil dihapus', 'success');
        } else {

            $this->setFlash('Gagal menghapus data', 'danger');
        }

        header('Location: ' . BASEURL . '/mahasiswa');
        exit;
    }
}
