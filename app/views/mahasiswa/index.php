<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fb;
        }

        .card {
            border: none;
            border-radius: 15px;
        }

        .table th {
            vertical-align: middle;
            white-space: nowrap;
        }

        .table td {
            vertical-align: middle;
        }

        .table-responsive {
            border-radius: 10px;
        }

        .btn {
            border-radius: 8px;
        }

        .search-card {
            background-color: #ffffff;
            border-radius: 15px;
        }
    </style>
</head>

<body>

    <div class="container py-5">

        <!-- Flash Message -->
        <?php
        $controller = new Controller();
        $controller->flash();
        ?>

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="fw-bold mb-1">Data Mahasiswa</h2>
                <p class="text-muted mb-0">
                    Sistem Informasi Data Mahasiswa MVC
                </p>
            </div>

            <a href="<?= BASEURL; ?>/mahasiswa/create"
                class="btn btn-primary px-4">
                + Tambah Mahasiswa
            </a>

        </div>

        <!-- Search & Filter -->
        <div class="card shadow-sm search-card mb-4">

            <div class="card-body">

                <form method="GET" action="<?= BASEURL; ?>/mahasiswa">

                    <div class="row g-3 align-items-end">

                        <div class="col-md-5">

                            <label class="form-label fw-semibold">
                                Cari Mahasiswa
                            </label>

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Cari NPM atau Nama..."
                                value="<?= $search ?? ''; ?>">

                        </div>

                        <div class="col-md-4">

                            <label class="form-label fw-semibold">
                                Filter Jurusan
                            </label>

                            <select name="jurusan" class="form-select">

                                <option value="">
                                    -- Semua Jurusan --
                                </option>

                                <option value="Teknik Informatika"
                                    <?= (($jurusan ?? '') == 'Teknik Informatika') ? 'selected' : ''; ?>>
                                    Teknik Informatika
                                </option>

                                <option value="Sistem Informasi"
                                    <?= (($jurusan ?? '') == 'Sistem Informasi') ? 'selected' : ''; ?>>
                                    Sistem Informasi
                                </option>

                            </select>

                        </div>

                        <div class="col-md-3 d-flex gap-2">

                            <button type="submit"
                                class="btn btn-primary w-100">
                                Cari
                            </button>

                            <a href="<?= BASEURL; ?>/mahasiswa"
                                class="btn btn-secondary w-100">
                                Reset
                            </a>

                        </div>

                    </div>

                </form>

            </div>

        </div>

        <!-- Table -->
        <div class="card shadow">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle text-center">

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
                                <th width="170">Aksi</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php if (!empty($mahasiswa)) : ?>

                                <?php $no = 1; ?>

                                <?php foreach ($mahasiswa as $mhs) : ?>

                                    <tr>

                                        <td><?= $no++; ?></td>

                                        <td>
                                            <span class="fw-semibold">
                                                <?= $mhs['npm']; ?>
                                            </span>
                                        </td>

                                        <td><?= $mhs['nama']; ?></td>

                                        <td><?= $mhs['fakultas']; ?></td>

                                        <td>

                                            <?php if ($mhs['jurusan'] == 'Teknik Informatika') : ?>

                                                <span class="badge bg-primary">
                                                    <?= $mhs['jurusan']; ?>
                                                </span>

                                            <?php else : ?>

                                                <span class="badge bg-success">
                                                    <?= $mhs['jurusan']; ?>
                                                </span>

                                            <?php endif; ?>

                                        </td>

                                        <td><?= $mhs['tempat_lahir']; ?></td>

                                        <td>
                                            <?= date('d-m-Y', strtotime($mhs['tanggal_lahir'])); ?>
                                        </td>

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

                                        <td>

                                            <div class="d-flex justify-content-center gap-2">

                                                <a href="<?= BASEURL; ?>/mahasiswa/edit/<?= $mhs['id']; ?>"
                                                    class="btn btn-warning btn-sm">
                                                    Edit
                                                </a>

                                                <a href="<?= BASEURL; ?>/mahasiswa/delete/<?= $mhs['id']; ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    Hapus
                                                </a>

                                            </div>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            <?php else : ?>

                                <tr>

                                    <td colspan="10" class="text-center text-muted py-4">
                                        Data mahasiswa tidak ditemukan
                                    </td>

                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>