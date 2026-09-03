<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h1 class="text-center mb-4">Politeknik Negeri Jember</h1>

        <div class="card shadow">
            <div class="card-body">

                <h2 class="card-title mb-4">Daftar Mahasiswa</h2>

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($mahasiswa as $mhs): ?>
                            <tr>
                                <td><?= $mhs['nim'] ?></td>
                                <td><?= $mhs['nama'] ?></td>
                                <td><?= $mhs['prodi'] ?></td>
                                <td>
                                    <a
                                        href="?url=mahasiswa/detail&nim=<?= $mhs['nim']; ?>"
                                        class="btn btn-primary btn-sm">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <a href="?url=dosen" class="btn btn-secondary">
                    Daftar Dosen
                </a>

            </div>
        </div>

    </div>

</body>

</html>