<?php 

require_once __DIR__ . '/../app/Controllers/MahasiswaController.php';
require_once __DIR__ . '/../app/Controllers/Dosencontroller.php';

$url = $_GET['url'] ?? 'mahasiswa';

if ($url == 'mahasiswa') {

    $controller = new MahasiswaController();    
    $controller->index();

} elseif ($url == 'mahasiswa/detail') {

    $controller = new MahasiswaController();
    $controller->detail();

} elseif ($url == 'dosen') {

    $controller = new DosenController();
    $controller->index();

} elseif ($url == 'dosen/detail') {

    $controller = new DosenController();
    $controller->detail();

} else {

    echo "404 - Halaman tidak ditemukan";

}