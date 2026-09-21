<?php

require_once __DIR__ . '/../Models/Dosen.php';
require_once __DIR__ . '/../Repositories/DosenRepository.php';
require_once __DIR__ . '/../../config/database.php';

class DosenController
{
    private DosenRepository $repo;

    // =========================
    // CONSTRUCTOR
    // =========================

    public function __construct()
    {
        $database = new Database();

        $this->repo = new DosenRepository($database);
    }

    // =========================
    // INDEX
    // =========================

    public function index()
    {
        $dosen = $this->repo->all();

        require_once __DIR__ . '/../Views/dosen/index.php';
    }

    // =========================
    // DETAIL
    // =========================

    public function detail()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: /si-akademik/public/dosen');
            exit;
        }

        $dosen = $this->repo->findById((int) $id);

        if (!$dosen) {
            echo "Data dosen tidak ditemukan.";
            exit;
        }

        require_once __DIR__ . '/../Views/dosen/detail.php';
    }

    // =========================
    // CREATE
    // =========================

    public function create()
    {
        require_once __DIR__ . '/../Views/dosen/create.php';
    }

    // =========================
    // STORE
    // =========================

    public function store()
    {
        $nidn = trim($_POST['nidn'] ?? '');
        $nama = trim($_POST['nama'] ?? '');
        $bidang_keahlian = trim(
            $_POST['bidang_keahlian'] ?? ''
        );

        try {

            // Membuat object Dosen
            $model = new Dosen();

            // Menggunakan Setter
            $model->setNidn($nidn);
            $model->setNama($nama);
            $model->setBidangKeahlian(
                $bidang_keahlian
            );

            // Menggunakan Getter
            $this->repo->create([
                'nidn' => $model->getNidn(),
                'nama' => $model->getNama(),
                'bidang_keahlian' =>
                    $model->getBidangKeahlian()
            ]);

        } catch (InvalidArgumentException $e) {

            echo "<h2>Terjadi Kesalahan</h2>";
            echo "<p>{$e->getMessage()}</p>";
            echo "<a href='/si-akademik/public/dosen/create'>";
            echo "Kembali";
            echo "</a>";

            return;
        }

        header('Location: /si-akademik/public/dosen');
        exit;
    }

    // =========================
    // EDIT
    // =========================

    public function edit()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: /si-akademik/public/dosen');
            exit;
        }

        $dosen = $this->repo->findById((int) $id);

        if (!$dosen) {
            echo "Data dosen tidak ditemukan.";
            exit;
        }

        require_once __DIR__ . '/../Views/dosen/edit.php';
    }

    // =========================
    // UPDATE
    // =========================

    public function update()
    {
        $id = $_POST['id'] ?? null;

        if (!$id) {
            header('Location: /si-akademik/public/dosen');
            exit;
        }

        $nidn = trim($_POST['nidn'] ?? '');
        $nama = trim($_POST['nama'] ?? '');
        $bidang_keahlian = trim(
            $_POST['bidang_keahlian'] ?? ''
        );

        try {

            // Membuat object Dosen
            $model = new Dosen();

            // Menggunakan Setter
            $model->setNidn($nidn);
            $model->setNama($nama);
            $model->setBidangKeahlian(
                $bidang_keahlian
            );

            // Menggunakan Getter
            $this->repo->update((int) $id, [
                'nidn' => $model->getNidn(),
                'nama' => $model->getNama(),
                'bidang_keahlian' =>
                    $model->getBidangKeahlian()
            ]);

        } catch (InvalidArgumentException $e) {

            echo "<h2>Terjadi Kesalahan</h2>";
            echo "<p>{$e->getMessage()}</p>";
            echo "<a href='/si-akademik/public/dosen'>";
            echo "Kembali";
            echo "</a>";

            return;
        }

        header('Location: /si-akademik/public/dosen');
        exit;
    }

    // =========================
    // DELETE
    // =========================

    public function delete()
    {
        $id = $_GET['id'] ?? $_POST['id'] ?? null;

        if (!$id) {
            header('Location: /si-akademik/public/dosen');
            exit;
        }

        $this->repo->delete((int) $id);

        header('Location: /si-akademik/public/dosen');
        exit;
    }
}