<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Mahasiswa</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>


<body>

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-body">

                <h2 class="mb-4">
                    Edit Mahasiswa
                </h2>


                <form
                    method="POST"
                    action="/si-akademik/public/mahasiswa/update"
                >

                    <!-- ID -->

                    <input
                        type="hidden"
                        name="id"
                        value="<?= htmlspecialchars($mahasiswa['id']) ?>"
                    >


                    <!-- NIM -->

                    <div class="mb-3">

                        <label class="form-label">
                            NIM
                        </label>

                        <input
                            type="text"
                            name="nim"
                            class="form-control"
                            value="<?= htmlspecialchars($mahasiswa['nim']) ?>"
                            required
                        >

                    </div>


                    <!-- NAMA -->

                    <div class="mb-3">

                        <label class="form-label">
                            Nama
                        </label>

                        <input
                            type="text"
                            name="nama"
                            class="form-control"
                            value="<?= htmlspecialchars($mahasiswa['nama']) ?>"
                            required
                        >

                    </div>


                    <!-- PROGRAM STUDI -->

                    <div class="mb-3">

                        <label class="form-label">
                            Program Studi
                        </label>

                        <input
                            type="text"
                            name="prodi"
                            class="form-control"
                            value="<?= htmlspecialchars($mahasiswa['prodi']) ?>"
                            required
                        >

                    </div>


                    <!-- DOSEN PEMBIMBING -->

                    <div class="mb-3">

                        <label class="form-label">
                            Dosen Pembimbing
                        </label>


                        <select
                            name="dosen_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                -- Pilih Dosen Pembimbing --
                            </option>


                            <?php foreach ($dosen as $item): ?>

                                <option
                                    value="<?= $item['id'] ?>"
                                    <?= (
                                        $mahasiswa['dosen_id']
                                        == $item['id']
                                    )
                                        ? 'selected'
                                        : ''
                                    ?>
                                >

                                    <?= htmlspecialchars(
                                        $item['nama']
                                    ) ?>

                                    -
                                    <?= htmlspecialchars(
                                        $item['nidn']
                                    ) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>


                    <!-- BUTTON -->

                    <button
                        type="submit"
                        class="btn btn-warning"
                    >
                        Update
                    </button>


                    <a
                        href="/si-akademik/public/mahasiswa"
                        class="btn btn-secondary"
                    >
                        Kembali
                    </a>


                </form>

            </div>

        </div>

    </div>

</body>

</html> 