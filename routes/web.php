<?php

$routes = [

    'GET' => [

        '/' => ['HomeController', 'index'],

        '/mahasiswa' => ['MahasiswaController', 'index'],

        '/mahasiswa/detail' => ['MahasiswaController', 'detail'],

        '/mahasiswa/search' => ['MahasiswaController', 'search'],

        '/mahasiswa/create' => ['MahasiswaController', 'create'],

        '/mahasiswa/session' => ['MahasiswaController', 'sessionDemo'],

        '/mahasiswa/cookie' => ['MahasiswaController', 'cookieDemo'],

        '/dosen' => ['DosenController', 'index'],

        '/dosen/detail' => ['DosenController', 'detail'],

    ],

    'POST' => [

        '/mahasiswa' => ['MahasiswaController', 'store'],

    ],

];