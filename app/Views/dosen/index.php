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

                <h2 class="card-title mb-4">Daftar Dosen</h2>

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>NIDN</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dosen as $dsn): ?>
                            <tr>
                                <td><?= $dsn['nidn'] ?></td>
                                <td><?= $dsn['nama'] ?></td>
                                <td>
                                    <a
                                        href="?url=dosen/detail&nidn=<?= $dsn['nidn']; ?>"
                                        class="btn btn-primary btn-sm">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <a href="?url=mahasiswa" class="btn btn-secondary">
                    Daftar Mahasiswa
                </a>

            </div>
        </div>

    </div>

</body>

</html>