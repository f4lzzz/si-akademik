<?php

require_once __DIR__ . '/../Models/Dosen.php';

class DosenController
{
    public function index()
    {
        global $pdo;

        $model = new Dosen($pdo);
        $dosen = $model->getAll();

        require_once __DIR__ . '/../Views/dosen/index.php';
    }

    public function detail()
    {
        global $pdo;

        $model = new Dosen($pdo);

        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: /si-akademik/public/dosen');
            exit;
        }

        $dosen = $model->getById($id);

        if (!$dosen) {
            echo "Data dosen tidak ditemukan.";
            exit;
        }

        require_once __DIR__ . '/../Views/dosen/detail.php';
    }

    // ==========================================
    // STEP 6: CREATE
    // ==========================================

    public function create()
    {
        require_once __DIR__ . '/../Views/dosen/create.php';
    }

    // ==========================================
    // STEP 6: STORE
    // ==========================================

    public function store()
    {
        global $pdo;

        $model = new Dosen($pdo);

        $model->create([
            'nidn' => $_POST['nidn'],
            'nama' => $_POST['nama'],
            'bidang_keahlian' => $_POST['bidang_keahlian']
        ]);

        header('Location: /si-akademik/public/dosen');
        exit;
    }

    // ==========================================
    // STEP 6: EDIT
    // ==========================================

    public function edit()
    {
        global $pdo;

        $model = new Dosen($pdo);

        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: /si-akademik/public/dosen');
            exit;
        }

        $dosen = $model->getById($id);

        if (!$dosen) {
            echo "Data dosen tidak ditemukan.";
            exit;
        }

        require_once __DIR__ . '/../Views/dosen/edit.php';
    }

    // ==========================================
    // STEP 6: UPDATE
    // ==========================================

    public function update()
    {
        global $pdo;

        $model = new Dosen($pdo);

        $id = $_POST['id'] ?? null;

        if (!$id) {
            header('Location: /si-akademik/public/dosen');
            exit;
        }

        $model->update($id, [
            'nidn' => $_POST['nidn'],
            'nama' => $_POST['nama'],
            'bidang_keahlian' => $_POST['bidang_keahlian']
        ]);

        header('Location: /si-akademik/public/dosen');
        exit;
    }

    // ==========================================
    // STEP 6: DELETE
    // ==========================================

    public function delete($id)
    {
        global $pdo;

        $model = new Dosen($pdo);

        $model->delete($id);

        header('Location: /si-akademik/public/dosen');
        exit;
    }
}