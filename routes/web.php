<?php

$routes = [

    'GET' => [

        // =========================
        // HALAMAN AWAL
        // =========================
        '/' => ['AuthController', 'login'],

        // =========================
        // LOGIN
        // =========================
        '/login' => ['AuthController', 'login'],
        '/logout' => ['AuthController', 'logout'],

        // =========================
        // DASHBOARD
        // =========================
        '/dashboard' => ['AuthController', 'dashboard'],

        // =========================
        // MAHASISWA
        // =========================
        '/mahasiswa' => ['MahasiswaController', 'index'],
        '/mahasiswa/detail' => ['MahasiswaController', 'detail'],
        '/mahasiswa/search' => ['MahasiswaController', 'search'],
        '/mahasiswa/create' => ['MahasiswaController', 'create'],
        '/mahasiswa/edit' => ['MahasiswaController', 'edit'],
        '/mahasiswa/session' => ['MahasiswaController', 'sessionDemo'],
        '/mahasiswa/cookie' => ['MahasiswaController', 'cookieDemo'],

        // =========================
        // DOSEN
        // =========================
        '/dosen' => ['DosenController', 'index'],
        '/dosen/detail' => ['DosenController', 'detail'],

        // CRUD Dosen
        '/dosen/create' => ['DosenController', 'create'],
        '/dosen/edit' => ['DosenController', 'edit'],
        '/dosen/delete' => ['DosenController', 'delete'],

    ],

    'POST' => [

        // =========================
        // LOGIN
        // =========================
        '/login/process' => ['AuthController', 'processLogin'],

        // =========================
        // CRUD MAHASISWA
        // =========================
        '/mahasiswa' => ['MahasiswaController', 'store'],
        '/mahasiswa/update' => ['MahasiswaController', 'update'],
        '/mahasiswa/delete' => ['MahasiswaController', 'delete'],

        // =========================
        // CRUD DOSEN
        // =========================
        '/dosen/store' => ['DosenController', 'store'],
        '/dosen/update' => ['DosenController', 'update'],

    ],

];