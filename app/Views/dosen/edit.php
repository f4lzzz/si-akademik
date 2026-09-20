<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dosen</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h1 class="text-center mb-4">Politeknik Negeri Jember</h1>

        <div class="card shadow">

            <div class="card-body">

                <h2 class="card-title mb-4">Edit Data Dosen</h2>

                <form action="/si-akademik/public/dosen/update" method="POST">

                    <!-- ID Dosen -->
                    <input
                        type="hidden"
                        name="id"
                        value="<?= htmlspecialchars($dosen['id']) ?>"
                    >

                    <!-- NIDN -->
                    <div class="mb-3">
                        <label for="nidn" class="form-label">
                            NIDN
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="nidn"
                            name="nidn"
                            value="<?= htmlspecialchars($dosen['nidn']) ?>"
                            required
                        >
                    </div>

                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">
                            Nama
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="nama"
                            name="nama"
                            value="<?= htmlspecialchars($dosen['nama']) ?>"
                            required
                        >
                    </div>

                    <!-- Bidang Keahlian -->
                    <div class="mb-3">
                        <label for="bidang_keahlian" class="form-label">
                            Bidang Keahlian
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            id="bidang_keahlian"
                            name="bidang_keahlian"
                            value="<?= htmlspecialchars($dosen['bidang_keahlian']) ?>"
                            required
                        >
                    </div>

                    <!-- Tombol -->
                    <button type="submit" class="btn btn-warning">
                        Update
                    </button>

                    <a
                        href="/si-akademik/public/dosen"
                        class="btn btn-secondary"
                    >
                        Batal
                    </a>

                </form>

            </div>

        </div>

    </div>

</body>

</html>