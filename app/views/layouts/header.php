<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= $title ?? 'MVC Mahasiswa'; ?>
    </title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .card {
            border: none;
            border-radius: 12px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">

        <div class="container">

            <a class="navbar-brand" href="<?= BASEURL; ?>">
                MVC Mahasiswa
            </a>

            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/mvc_mahasiswa/public/' || $_SERVER['REQUEST_URI'] == '/mvc_mahasiswa/public') ? 'active' : ''; ?>"
                            href="<?= BASEURL; ?>">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/mvc_mahasiswa/public/mahasiswa') ? 'active' : ''; ?>"
                            href="<?= BASEURL; ?>/mahasiswa">
                            Data Mahasiswa
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= (strpos($_SERVER['REQUEST_URI'], '/mahasiswa/create') !== false) ? 'active' : ''; ?>"
                            href="<?= BASEURL; ?>/mahasiswa/create">
                            Tambah Mahasiswa
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>