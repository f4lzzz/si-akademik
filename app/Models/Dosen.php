<?php

require_once __DIR__ . '/../../config/database.php';

class Dosen
{
    private $pdo;

    public function __construct(?PDO $pdo = null)
    {
        if ($pdo === null) {
            global $pdo;
            $this->pdo = $pdo;
        } else {
            $this->pdo = $pdo;
        }
    }

    public function getAll()
    {
        $stmt = $this->pdo->query(
            "SELECT * FROM dosen ORDER BY nama ASC"
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByNidn($nidn)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM dosen WHERE nidn = :nidn"
        );

        $stmt->execute([
            'nidn' => $nidn
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result : null;
    }

    // STEP 3: Mencari dosen berdasarkan ID
    public function getById($id)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM dosen WHERE id = :id"
        );

        $stmt->execute([
            'id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // STEP 3: Menambah data dosen
    public function create($data)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO dosen
            (nidn, nama, bidang_keahlian)
            VALUES (:nidn, :nama, :bidang_keahlian)"
        );

        return $stmt->execute([
            'nidn' => $data['nidn'],
            'nama' => $data['nama'],
            'bidang_keahlian' => $data['bidang_keahlian']
        ]);
    }

    // STEP 4: Mengubah data dosen
    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE dosen
            SET nidn = :nidn,
                nama = :nama,
                bidang_keahlian = :bidang_keahlian
            WHERE id = :id"
        );

        return $stmt->execute([
            'id' => $id,
            'nidn' => $data['nidn'],
            'nama' => $data['nama'],
            'bidang_keahlian' => $data['bidang_keahlian']
        ]);
    }

    // STEP 4: Menghapus data dosen
    public function delete($id)
    {
        $stmt = $this->pdo->prepare(
            "DELETE FROM dosen WHERE id = :id"
        );

        return $stmt->execute([
            'id' => $id
        ]);
    }
}