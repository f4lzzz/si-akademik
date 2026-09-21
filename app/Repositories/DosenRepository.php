<?php

class DosenRepository
{
    private PDO $pdo;

    public function __construct(Database $database)
    {
        $this->pdo = $database->getConnection();
    }

    // =========================
    // GET ALL
    // =========================
    public function all(): array
    {
        $sql = "SELECT *
                FROM dosen
                ORDER BY nama ASC";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // =========================
    // GET BY ID
    // =========================
    public function findById(int $id): ?array
    {
        $sql = "SELECT *
                FROM dosen
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'id' => $id
        ]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ?: null;
    }

    // =========================
    // GET BY NIDN
    // =========================
    public function findByNidn(string $nidn): ?array
    {
        $sql = "SELECT *
                FROM dosen
                WHERE nidn = :nidn";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'nidn' => $nidn
        ]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ?: null;
    }

    // =========================
    // CREATE
    // =========================
    public function create(array $data): bool
    {
        $sql = "INSERT INTO dosen
                (nidn, nama, bidang_keahlian)
                VALUES
                (:nidn, :nama, :bidang_keahlian)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'nidn' => $data['nidn'],
            'nama' => $data['nama'],
            'bidang_keahlian' => $data['bidang_keahlian']
        ]);
    }

    // =========================
    // UPDATE
    // =========================
    public function update(int $id, array $data): bool
    {
        $sql = "UPDATE dosen
                SET nidn = :nidn,
                    nama = :nama,
                    bidang_keahlian = :bidang_keahlian
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'id' => $id,
            'nidn' => $data['nidn'],
            'nama' => $data['nama'],
            'bidang_keahlian' => $data['bidang_keahlian']
        ]);
    }

    // =========================
    // DELETE
    // =========================
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM dosen
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'id' => $id
        ]);
    }
}   