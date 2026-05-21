<?php

use Dompdf\Dompdf;

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
        $data['title'] = 'Data Mahasiswa';

        $this->view('mahasiswa/index', $data);
    }

    public function create()
    {
        $this->view('mahasiswa/create');
        $this->checkAdmin();
    }

    public function store()
    {
        $this->checkAdmin();
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
        $this->checkAdmin();
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
        $this->checkAdmin();
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
        $this->checkAdmin();
        $model = $this->model('Mahasiswa');

        if ($model->delete($id)) {

            $this->setFlash('Data berhasil dihapus', 'success');
        } else {

            $this->setFlash('Gagal menghapus data', 'danger');
        }

        header('Location: ' . BASEURL . '/mahasiswa');
        exit;
    }

    public function exportCSV()
    {
        $model = $this->model('Mahasiswa');

        $search = $_GET['search'] ?? '';
        $jurusan = $_GET['jurusan'] ?? '';

        if (!empty($search) || !empty($jurusan)) {

            $mahasiswa = $model->searchAndFilter($search, $jurusan);
        } else {

            $mahasiswa = $model->getAll();
        }

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="data_mahasiswa.csv"');

        $output = fopen('php://output', 'w');

        // Header kolom
        fputcsv($output, [
            'No',
            'NPM',
            'Nama Lengkap',
            'Fakultas',
            'Jurusan',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Status'
        ]);

        // LOOP TARUH DI SINI
        $no = 1;

        foreach ($mahasiswa as $mhs) {

            fputcsv($output, [
                $no++,
                $mhs['npm'],
                $mhs['nama'],
                $mhs['fakultas'],
                $mhs['jurusan'],
                $mhs['tempat_lahir'],
                date('d-m-Y', strtotime($mhs['tanggal_lahir'])),
                $mhs['jenis_kelamin'],
                ($mhs['status_id'] == 1) ? 'Aktif' : 'Nonaktif'
            ]);
        }

        fclose($output);

        exit;
    }

    public function exportPDF()
    {
        $model = $this->model('Mahasiswa');

        $search = $_GET['search'] ?? '';
        $jurusan = $_GET['jurusan'] ?? '';

        if (!empty($search) || !empty($jurusan)) {

            $mahasiswa = $model->searchAndFilter($search, $jurusan);
        } else {

            $mahasiswa = $model->getAll();
        }

        $html = '
    <h2 style="text-align:center;">
        Data Mahasiswa
    </h2>

    <table border="1" width="100%" cellpadding="5" cellspacing="0">

        <tr style="background:#f2f2f2;">
            <th>No</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Fakultas</th>
            <th>Jurusan</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Status</th>
        </tr>
    ';

        $no = 1;

        foreach ($mahasiswa as $mhs) {

            $status = ($mhs['status_id'] == 1)
                ? 'Aktif'
                : 'Nonaktif';

            $html .= '
        <tr>
            <td>' . $no++ . '</td>
            <td>' . $mhs['npm'] . '</td>
            <td>' . $mhs['nama'] . '</td>
            <td>' . $mhs['fakultas'] . '</td>
            <td>' . $mhs['jurusan'] . '</td>
            <td>' . $mhs['tempat_lahir'] . '</td>
            <td>' . $mhs['tanggal_lahir'] . '</td>
            <td>' . $mhs['jenis_kelamin'] . '</td>
            <td>' . $status . '</td>
        </tr>
        ';
        }

        $html .= '</table>';

        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream(
            'data_mahasiswa.pdf',
            ['Attachment' => true]
        );
    }

    public function __construct()
    {
        if (!isset($_SESSION['user'])) {

            header('Location: ' . BASEURL . '/auth/login');

            exit;
        }
    }

    private function checkAdmin()
    {
        if ($_SESSION['user']['role'] != 'admin') {

            $_SESSION['error'] =
                'Akses ditolak';

            header('Location: ' . BASEURL . '/mahasiswa');

            exit;
        }
    }
}
