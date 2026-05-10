<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <?php if (isset($mahasiswa)) : ?>

        <div class="container mt-5">

            <div class="card shadow">

                <div class="card-header bg-warning">
                    <h3>Edit Mahasiswa</h3>
                </div>

                <div class="card-body">

                    <?php
                    $controller = new Controller();
                    $controller->flash();
                    ?>

                    <form action="<?= BASEURL; ?>/mahasiswa/update/<?= $mahasiswa['id']; ?>" method="POST">

                        <div class="mb-3">
                            <label>NPM</label>
                            <input type="text"
                                name="npm"
                                class="form-control"
                                value="<?= $mahasiswa['npm']; ?>">
                        </div>

                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text"
                                name="nama"
                                class="form-control"
                                value="<?= $mahasiswa['nama']; ?>">
                        </div>

                        <div class="mb-3">
                            <label>Fakultas</label>
                            <input type="text"
                                name="fakultas"
                                class="form-control"
                                value="<?= $mahasiswa['fakultas']; ?>">
                        </div>

                        <div class="mb-3">
                            <label>Jurusan</label>

                            <select name="jurusan" class="form-select">

                                <option value="Teknik Informatika"
                                    <?= ($mahasiswa['jurusan'] == 'Teknik Informatika') ? 'selected' : ''; ?>>
                                    Teknik Informatika
                                </option>

                                <option value="Sistem Informasi"
                                    <?= ($mahasiswa['jurusan'] == 'Sistem Informasi') ? 'selected' : ''; ?>>
                                    Sistem Informasi
                                </option>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Tempat Lahir</label>
                            <input type="text"
                                name="tempat_lahir"
                                class="form-control"
                                value="<?= $mahasiswa['tempat_lahir']; ?>">
                        </div>

                        <div class="mb-3">
                            <label>Tanggal Lahir</label>
                            <input type="date"
                                name="tanggal_lahir"
                                class="form-control"
                                value="<?= $mahasiswa['tanggal_lahir']; ?>">
                        </div>

                        <div class="mb-3">

                            <label>Jenis Kelamin</label>
                            <br>

                            <input type="radio"
                                name="jenis_kelamin"
                                value="Laki-laki"
                                <?= ($mahasiswa['jenis_kelamin'] == 'Laki-laki') ? 'checked' : ''; ?>>
                            Laki-laki

                            <input type="radio"
                                name="jenis_kelamin"
                                value="Perempuan"
                                class="ms-3"
                                <?= ($mahasiswa['jenis_kelamin'] == 'Perempuan') ? 'checked' : ''; ?>>
                            Perempuan

                        </div>

                        <button type="submit" class="btn btn-warning">
                            Update
                        </button>

                        <a href="<?= BASEURL; ?>/mahasiswa"
                            class="btn btn-secondary">
                            Kembali
                        </a>

                    </form>

                </div>

            </div>

        </div>
    <?php endif; ?>

</body>

</html>