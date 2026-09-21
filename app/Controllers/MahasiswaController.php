<?php

require_once __DIR__ .
    '/../Models/Mahasiswa.php';

require_once __DIR__ .
    '/../Repositories/MahasiswaRepository.php';

require_once __DIR__ .
    '/../Repositories/DosenRepository.php';


class MahasiswaController
{
    private MahasiswaRepository $repo;

    private DosenRepository $dosenRepo;


    // ==================================================
    // CONSTRUCTOR
    // ==================================================

    public function __construct(
        MahasiswaRepository $repo,
        DosenRepository $dosenRepo
    ) {

        $this->repo = $repo;

        $this->dosenRepo = $dosenRepo;
    }


    // ==================================================
    // INDEX
    // ==================================================

    public function index()
    {
        $mahasiswa = $this->repo->all();

        require_once __DIR__ .
            '/../Views/mahasiswa/index.php';
    }


    // ==================================================
    // DETAIL
    // ==================================================

    public function detail()
    {
        $nim = $_GET['nim'] ?? null;


        if (!$nim) {

            header(
                'Location: /si-akademik/public/mahasiswa'
            );

            exit;
        }


        $mahasiswa =
            $this->repo->findByNim($nim);


        if (!$mahasiswa) {

            echo "Data mahasiswa tidak ditemukan.";

            exit;
        }


        require_once __DIR__ .
            '/../Views/mahasiswa/detail.php';
    }


    // ==================================================
    // SHOW
    // /mahasiswa/5
    // ==================================================

    public function show($id)
    {
        echo "<h2>Detail Mahasiswa</h2>";

        echo "<p>ID Mahasiswa: " .
            htmlspecialchars($id) .
            "</p>";

        echo "<a href='/si-akademik/public/mahasiswa'>";
        echo "Kembali";
        echo "</a>";
    }


    // ==================================================
    // SEARCH
    // ==================================================

    public function search()
    {
        $nim = $_GET['nim'] ?? '';

        $mahasiswa = null;


        if ($nim !== '') {

            $mahasiswa =
                $this->repo->findByNim($nim);
        }


        require_once __DIR__ .
            '/../Views/mahasiswa/detail.php';
    }


    // ==================================================
    // CREATE
    // ==================================================

    public function create()
    {
        // Ambil semua data dosen
        $dosen = $this->dosenRepo->all();


        // Kirim data dosen ke view
        require_once __DIR__ .
            '/../Views/mahasiswa/create.php';
    }


    // ==================================================
    // STORE
    // ==================================================

    public function store()
    {
        $nim =
            trim($_POST['nim'] ?? '');

        $nama =
            trim($_POST['nama'] ?? '');

        $prodi =
            trim($_POST['prodi'] ?? '');

        $dosen_id =
            $_POST['dosen_id'] ?? '';


        $errors = [];


        // ==================================================
        // VALIDASI NIM
        // ==================================================

        if ($nim === '') {

            $errors[] =
                'NIM wajib diisi.';

        } elseif (!is_numeric($nim)) {

            $errors[] =
                'NIM harus berupa angka.';
        }


        // ==================================================
        // VALIDASI NAMA
        // ==================================================

        if ($nama === '') {

            $errors[] =
                'Nama wajib diisi.';
        }


        // ==================================================
        // VALIDASI PRODI
        // ==================================================

        if ($prodi === '') {

            $errors[] =
                'Program Studi wajib diisi.';
        }


        // ==================================================
        // VALIDASI DOSEN
        // ==================================================

        if ($dosen_id === '') {

            $errors[] =
                'Dosen Pembimbing wajib dipilih.';
        }


        // ==================================================
        // JIKA ADA ERROR
        // ==================================================

        if (!empty($errors)) {

            echo "<h2>Terjadi Kesalahan</h2>";

            echo "<ul>";


            foreach ($errors as $error) {

                echo "<li>" .
                    htmlspecialchars($error) .
                    "</li>";
            }


            echo "</ul>";


            echo "<a href='/si-akademik/public/mahasiswa/create'>";
            echo "Kembali";
            echo "</a>";

            return;
        }


        // ==================================================
        // OBJECT MAHASISWA
        // ==================================================

        $model = new Mahasiswa();


        try {

            $model->setNim($nim);

            $model->setNama($nama);

            $model->setProdi($prodi);

            $model->setDosenId(
                (int) $dosen_id
            );

        } catch (
            InvalidArgumentException $e
        ) {

            echo "<h2>Terjadi Kesalahan</h2>";

            echo "<p>" .
                htmlspecialchars(
                    $e->getMessage()
                ) .
                "</p>";

            echo "<a href='/si-akademik/public/mahasiswa/create'>";
            echo "Kembali";
            echo "</a>";

            return;
        }


        // ==================================================
        // SIMPAN DATA
        // ==================================================

        $this->repo->create([

            'nim' =>
                $model->getNim(),

            'nama' =>
                $model->getNama(),

            'prodi' =>
                $model->getProdi(),

            'dosen_id' =>
                $model->getDosenId()
        ]);


        // Kembali
        header(
            'Location: /si-akademik/public/mahasiswa'
        );

        exit;
    }


    // ==================================================
    // EDIT
    // ==================================================

    public function edit()
    {
        $id =
            $_GET['id'] ?? null;


        if (!$id) {

            header(
                'Location: /si-akademik/public/mahasiswa'
            );

            exit;
        }


        // Data mahasiswa
        $mahasiswa =
            $this->repo->findById(
                (int) $id
            );


        if (!$mahasiswa) {

            echo "Data mahasiswa tidak ditemukan.";

            exit;
        }


        // Data dosen
        $dosen =
            $this->dosenRepo->all();


        require_once __DIR__ .
            '/../Views/mahasiswa/edit.php';
    }


    // ==================================================
    // UPDATE
    // ==================================================

    public function update()
    {
        $id =
            $_POST['id'] ?? null;


        if (!$id) {

            header(
                'Location: /si-akademik/public/mahasiswa'
            );

            exit;
        }


        $nim =
            trim($_POST['nim'] ?? '');

        $nama =
            trim($_POST['nama'] ?? '');

        $prodi =
            trim($_POST['prodi'] ?? '');

        $dosen_id =
            $_POST['dosen_id'] ?? '';


        $errors = [];


        // ==================================================
        // VALIDASI NIM
        // ==================================================

        if ($nim === '') {

            $errors[] =
                'NIM wajib diisi.';

        } elseif (!is_numeric($nim)) {

            $errors[] =
                'NIM harus berupa angka.';
        }


        // ==================================================
        // VALIDASI NAMA
        // ==================================================

        if ($nama === '') {

            $errors[] =
                'Nama wajib diisi.';
        }


        // ==================================================
        // VALIDASI PRODI
        // ==================================================

        if ($prodi === '') {

            $errors[] =
                'Program Studi wajib diisi.';
        }


        // ==================================================
        // VALIDASI DOSEN
        // ==================================================

        if ($dosen_id === '') {

            $errors[] =
                'Dosen Pembimbing wajib dipilih.';
        }


        // ==================================================
        // JIKA ERROR
        // ==================================================

        if (!empty($errors)) {

            echo "<h2>Terjadi Kesalahan</h2>";

            echo "<ul>";


            foreach ($errors as $error) {

                echo "<li>" .
                    htmlspecialchars($error) .
                    "</li>";
            }


            echo "</ul>";


            echo "<a href='/si-akademik/public/mahasiswa'>";
            echo "Kembali";
            echo "</a>";

            return;
        }


        // ==================================================
        // OBJECT MAHASISWA
        // ==================================================

        $model = new Mahasiswa();


        try {

            $model->setNim($nim);

            $model->setNama($nama);

            $model->setProdi($prodi);

            $model->setDosenId(
                (int) $dosen_id
            );

        } catch (
            InvalidArgumentException $e
        ) {

            echo "<h2>Terjadi Kesalahan</h2>";

            echo "<p>" .
                htmlspecialchars(
                    $e->getMessage()
                ) .
                "</p>";

            echo "<a href='/si-akademik/public/mahasiswa'>";
            echo "Kembali";
            echo "</a>";

            return;
        }


        // ==================================================
        // UPDATE DATABASE
        // ==================================================

        $this->repo->update(

            (int) $id,

            [

                'nim' =>
                    $model->getNim(),

                'nama' =>
                    $model->getNama(),

                'prodi' =>
                    $model->getProdi(),

                'dosen_id' =>
                    $model->getDosenId()
            ]
        );


        header(
            'Location: /si-akademik/public/mahasiswa'
        );

        exit;
    }


    // ==================================================
    // DELETE
    // ==================================================

    public function delete()
    {
        $id =
            $_POST['id'] ?? null;


        if (!$id) {

            header(
                'Location: /si-akademik/public/mahasiswa'
            );

            exit;
        }


        $this->repo->delete(
            (int) $id
        );


        header(
            'Location: /si-akademik/public/mahasiswa'
        );

        exit;
    }


    // ==================================================
    // SESSION DEMO
    // ==================================================

    public function sessionDemo()
    {
        $nim =
            $_SESSION['nim_mahasiswa']
            ?? 'Belum ada';

        $nama =
            $_SESSION['nama_mahasiswa']
            ?? 'Belum ada';

        $prodi =
            $_SESSION['prodi_mahasiswa']
            ?? 'Belum ada';


        echo "<h2>Data Session</h2>";

        echo "<p>NIM: " .
            htmlspecialchars($nim) .
            "</p>";

        echo "<p>Nama: " .
            htmlspecialchars($nama) .
            "</p>";

        echo "<p>Program Studi: " .
            htmlspecialchars($prodi) .
            "</p>";

        echo "<a href='/si-akademik/public/mahasiswa'>";
        echo "Kembali";
        echo "</a>";
    }


    // ==================================================
    // COOKIE DEMO
    // ==================================================

    public function cookieDemo()
    {
        $nama =
            $_COOKIE['nama_pengunjung']
            ?? 'Belum ada';


        echo "<h2>Data Cookie</h2>";

        echo "<p>Nama pengunjung: " .
            htmlspecialchars($nama) .
            "</p>";

        echo "<a href='/si-akademik/public/mahasiswa'>";
        echo "Kembali";
        echo "</a>";
    }
}