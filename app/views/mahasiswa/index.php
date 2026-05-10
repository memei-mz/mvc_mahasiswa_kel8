<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <?php
        $controller = new Controller();
        $controller->flash();
        ?>
        <a href="<?= BASEURL; ?>/mahasiswa/create" class="btn btn-primary mb-3">
            Tambah Mahasiswa
        </a>

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h3 class="mb-0 text-center">Data Mahasiswa</h3>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped table-hover align-middle text-center">

                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>NPM</th>
                            <th>Nama Lengkap</th>
                            <th>Fakultas</th>
                            <th>Jurusan</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if (!empty($mahasiswa)) : ?>

                            <?php $no = 1; ?>

                            <?php foreach ($mahasiswa as $mhs) : ?>

                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $mhs['npm']; ?></td>
                                    <td><?= $mhs['nama']; ?></td>
                                    <td><?= $mhs['fakultas']; ?></td>
                                    <td><?= $mhs['jurusan']; ?></td>
                                    <td><?= $mhs['tempat_lahir']; ?></td>
                                    <td><?= date('d-m-Y', strtotime($mhs['tanggal_lahir'])); ?></td>
                                    <td><?= $mhs['jenis_kelamin']; ?></td>

                                    <td>
                                        <?php if ($mhs['status_id'] == 1) : ?>

                                            <span class="badge bg-success">
                                                Aktif
                                            </span>

                                        <?php else : ?>

                                            <span class="badge bg-danger">
                                                Nonaktif
                                            </span>

                                        <?php endif; ?>
                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else : ?>

                            <tr>
                                <td colspan="9">
                                    Data mahasiswa kosong
                                </td>
                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>