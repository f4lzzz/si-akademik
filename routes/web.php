<?php

$routes = [

    'GET' => [

        '/' => ['HomeController', 'index'],

        '/mahasiswa' => ['MahasiswaController', 'index'],

        '/mahasiswa/detail' => ['MahasiswaController', 'detail'],

        '/dosen' => ['DosenController', 'index'],

        '/dosen/detail' => ['DosenController', 'detail'],

    ],

];