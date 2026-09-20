<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dosen</title>
</head>
<body>

    <h1>Tambah Dosen</h1>

    <form action="/si-akademik/public/dosen/store" method="POST">

        <div>
            <label for="nidn">NIDN</label>
            <br>
            <input type="text" name="nidn" id="nidn" required>
        </div>

        <br>

        <div>
            <label for="nama">Nama</label>
            <br>
            <input type="text" name="nama" id="nama" required>
        </div>

        <br>

        <div>
            <label for="bidang_keahlian">Bidang Keahlian</label>
            <br>
            <input type="text" name="bidang_keahlian" id="bidang_keahlian" required>
        </div>

        <br>

        <button type="submit">Simpan</button>

    </form>

</body>
</html>