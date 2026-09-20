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
        $stmt = $this->pdo->query("SELECT * FROM dosen ORDER BY nama ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByNidn($nidn)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM dosen WHERE nidn = :nidn");
        $stmt->execute(['nidn' => $nidn]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result : null;
    }
}