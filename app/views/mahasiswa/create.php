    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h3>Tambah Mahasiswa</h3>
            </div>

            <div class="card-body">

                <?php
                $controller = new Controller();
                $controller->flash();
                ?>

                <form action="<?= BASEURL; ?>/mahasiswa/store" method="POST">

                    <div class="mb-3">
                        <label>NPM</label>
                        <input type="text" name="npm" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Fakultas</label>
                        <input type="text" name="fakultas" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Jurusan</label>

                        <select name="jurusan" class="form-select">
                            <option value="">-- Pilih Jurusan --</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Jenis Kelamin</label>
                        <br>

                        <input type="radio" name="jenis_kelamin" value="Laki-laki">
                        Laki-laki

                        <input type="radio" name="jenis_kelamin" value="Perempuan" class="ms-3">
                        Perempuan
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>

                    <a href="<?= BASEURL; ?>/mahasiswa" class="btn btn-secondary">
                        Kembali
                    </a>

                </form>

            </div>

        </div>

    </div>