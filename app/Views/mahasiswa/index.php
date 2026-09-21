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

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h2 class="card-title mb-0">
                        Daftar Mahasiswa
                    </h2>

                    <a
                        href="/si-akademik/public/mahasiswa/create"
                        class="btn btn-success"
                    >
                        + Tambah Mahasiswa
                    </a>

                </div>

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

                                <td>
                                    <?= htmlspecialchars($mhs['nim']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($mhs['nama']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($mhs['prodi']) ?>
                                </td>

                                <td>

                                    <!-- Detail -->
                                    <a
                                        href="/si-akademik/public/mahasiswa/detail?nim=<?= urlencode($mhs['nim']) ?>"
                                        class="btn btn-primary btn-sm"
                                    >
                                        Detail
                                    </a>

                                    <!-- Edit -->
                                    <a
                                        href="/si-akademik/public/mahasiswa/edit?id=<?= $mhs['id'] ?>"
                                        class="btn btn-warning btn-sm"
                                    >
                                        Edit
                                    </a>

                                    <!-- Hapus -->
                                    <form
                                        action="/si-akademik/public/mahasiswa/delete"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus data mahasiswa ini?');"
                                    >

                                        <input
                                            type="hidden"
                                            name="id"
                                            value="<?= $mhs['id'] ?>"
                                        >

                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-sm"
                                        >
                                            Hapus
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

                <div class="d-flex justify-content-between mt-4">

                    <!-- Button Kembali -->
                    <a
                        href="/si-akademik/public/"
                        class="btn btn-secondary"
                    >
                        ← Beranda
                    </a>

                    <!-- Button Dosen -->
                    <a
                        href="/si-akademik/public/dosen"
                        class="btn btn-primary"
                    >
                        Data Dosen →
                    </a>

                </div>

            </div>
        </div>

    </div>

</body>

</html>