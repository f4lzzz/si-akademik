<?php

class Database
{
    private $pdo;

    public function __construct()
    {
        $host = 'localhost';
        $dbname = 'si_akademik';
        $username = 'root';
        $password = '';

        $this->pdo = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
            $username,
            $password
        );

        $this->pdo->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}