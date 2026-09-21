<?php

class MahasiswaRepository
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
        $sql = "SELECT mahasiswa.*,
                       dosen.nama AS nama_dosen
                FROM mahasiswa
                LEFT JOIN dosen
                    ON mahasiswa.dosen_id = dosen.id
                ORDER BY mahasiswa.nama ASC";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // =========================
    // GET BY ID
    // =========================
    public function findById(int $id): ?array
    {
        $sql = "SELECT mahasiswa.*,
                       dosen.nama AS nama_dosen
                FROM mahasiswa
                LEFT JOIN dosen
                    ON mahasiswa.dosen_id = dosen.id
                WHERE mahasiswa.id = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'id' => $id
        ]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ?: null;
    }

    // =========================
    // GET BY NIM
    // =========================
    public function findByNim(string $nim): ?array
    {
        $sql = "SELECT mahasiswa.*,
                       dosen.nama AS nama_dosen
                FROM mahasiswa
                LEFT JOIN dosen
                    ON mahasiswa.dosen_id = dosen.id
                WHERE mahasiswa.nim = :nim";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            'nim' => $nim
        ]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ?: null;
    }

    // =========================
    // CREATE
    // =========================
    public function create(array $data): bool
    {
        $sql = "INSERT INTO mahasiswa
                (nim, nama, prodi, dosen_id)
                VALUES
                (:nim, :nama, :prodi, :dosen_id)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'prodi' => $data['prodi'],
            'dosen_id' => $data['dosen_id'] ?? null
        ]);
    }

    // =========================
    // UPDATE
    // =========================
    public function update(int $id, array $data): bool
    {
        $sql = "UPDATE mahasiswa
                SET nim = :nim,
                    nama = :nama,
                    prodi = :prodi,
                    dosen_id = :dosen_id
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'id' => $id,
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'prodi' => $data['prodi'],
            'dosen_id' => $data['dosen_id'] ?? null
        ]);
    }

    // =========================
    // DELETE
    // =========================
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM mahasiswa
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'id' => $id
        ]);
    }
}