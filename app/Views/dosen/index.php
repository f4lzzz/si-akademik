<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Dosen</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h1 class="text-center mb-4">Politeknik Negeri Jember</h1>

        <div class="card shadow">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h2 class="card-title mb-0">Daftar Dosen</h2>

                    <a href="/si-akademik/public/dosen/create"
                        class="btn btn-success">
                        + Tambah Dosen
                    </a>

                </div>

                <table class="table table-bordered table-striped">

                    <thead class="table-dark">
                        <tr>
                            <th>NIDN</th>
                            <th>Nama</th>
                            <th>Bidang Keahlian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($dosen as $dsn): ?>

                            <tr>

                                <td>
                                    <?= htmlspecialchars($dsn['nidn']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($dsn['nama']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($dsn['bidang_keahlian']) ?>
                                </td>

                                <td>

                                    <!-- Detail -->
                                    <a href="/si-akademik/public/dosen/detail?id=<?= $dsn['id'] ?>"
                                        class="btn btn-primary btn-sm">
                                        Detail
                                    </a>

                                    <!-- Edit -->
                                    <a href="/si-akademik/public/dosen/edit?id=<?= $dsn['id'] ?>"
                                        class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <!-- Hapus -->
                                    <a href="/si-akademik/public/dosen/delete?id=<?= $dsn['id'] ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data dosen ini?')">
                                        Hapus
                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

                <div class="d-flex justify-content-between mt-4">

                    <!-- Button Kembali -->
                    <a href="/si-akademik/public/" class="btn btn-secondary">
                        ← Beranda
                    </a>

                    <!-- Button Mahasiswa -->
                    <a href="/si-akademik/public/mahasiswa" class="btn btn-primary">
                        Data Mahasiswa →
                    </a>

                </div>

            </div>
        </div>

    </div>

</body>

</html>