<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Dosen</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h1 class="text-center mb-4">Politeknik Negeri Jember</h1>

        <div class="card shadow">

            <div class="card-body">

                <h2 class="card-title mb-4">Detail Dosen</h2>

                <?php if (!empty($dosen)): ?>
                    <table class="table table-bordered">

                        <tr>
                            <th width="200">NIDN</th>
                            <td><?= htmlspecialchars($dosen['nidn']) ?></td>
                        </tr>

                        <tr>
                            <th>Nama</th>
                            <td><?= htmlspecialchars($dosen['nama']) ?></td>
                        </tr>

                        <tr>
                            <th>Bidang Keahlian</th>
                            <td><?= htmlspecialchars($dosen['bidang_keahlian'] ?? '-') ?></td>
                        </tr>

                    </table>
                <?php else: ?>
                    <div class="alert alert-danger">Data dosen tidak ditemukan.</div>
                <?php endif; ?>

                <a href="/si-akademik/public/dosen" class="btn btn-secondary">
                    Kembali
                </a>

            </div>

        </div>

    </div>

</body>

</html>