<?php

session_start();

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../routes/web.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Base path project
$base = '/si-akademik/public';

if (str_starts_with($uri, $base)) {
    $uri = substr($uri, strlen($base)) ?: '/';
}

$method = $_SERVER['REQUEST_METHOD'];


// ==================================================
// ROUTING
// ==================================================

if (isset($routes[$method][$uri])) {

    [$controllerName, $action] = $routes[$method][$uri];


    // ==================================================
    // MIDDLEWARE
    // ==================================================

    $protectedRoutes = [
        '/dashboard',

        // Mahasiswa
        '/mahasiswa',
        '/mahasiswa/detail',
        '/mahasiswa/search',
        '/mahasiswa/create',
        '/mahasiswa/edit',
        '/mahasiswa/session',
        '/mahasiswa/cookie',

        // Dosen
        '/dosen',
        '/dosen/detail',
        '/dosen/create',
        '/dosen/edit',
        '/dosen/delete'
    ];

    if (in_array($uri, $protectedRoutes)) {

        require_once __DIR__ . '/../app/Middleware/AuthMiddleware.php';

        AuthMiddleware::handle();
    }


    // ==================================================
    // CONTROLLER
    // ==================================================

    if (!class_exists($controllerName)) {

        require_once __DIR__ .
            '/../app/Controllers/' .
            $controllerName .
            '.php';
    }


    // ==================================================
    // DEPENDENCY INJECTION
    // ==================================================

    if ($controllerName === 'MahasiswaController') {

        // Repository Mahasiswa
        require_once __DIR__ .
            '/../app/Repositories/MahasiswaRepository.php';

        // Repository Dosen
        require_once __DIR__ .
            '/../app/Repositories/DosenRepository.php';


        // Database
        $database = new Database();


        // Mahasiswa Repository
        $mahasiswaRepository =
            new MahasiswaRepository($database);


        // Dosen Repository
        $dosenRepository =
            new DosenRepository($database);


        // Controller menerima kedua repository
        $controller = new MahasiswaController(
            $mahasiswaRepository,
            $dosenRepository
        );

    } else {

        // Controller lainnya
        $controller = new $controllerName();
    }


    // ==================================================
    // DELETE DOSEN
    // ==================================================

    if (
        $controllerName === 'DosenController'
        && $action === 'delete'
    ) {

        $id = $_GET['id'] ?? null;

        if (!$id) {

            header(
                'Location: /si-akademik/public/dosen'
            );

            exit;
        }

        $controller->$action($id);

    } else {

        $controller->$action();
    }


// ==================================================
// ROUTING DINAMIS
// /mahasiswa/5
// ==================================================

} elseif (
    $method === 'GET'
    && preg_match(
        '#^/mahasiswa/([0-9]+)$#',
        $uri,
        $matches
    )
) {

    // Middleware
    require_once __DIR__ .
        '/../app/Middleware/AuthMiddleware.php';

    AuthMiddleware::handle();


    // Controller
    if (!class_exists('MahasiswaController')) {

        require_once __DIR__ .
            '/../app/Controllers/MahasiswaController.php';
    }


    // Repository
    require_once __DIR__ .
        '/../app/Repositories/MahasiswaRepository.php';

    require_once __DIR__ .
        '/../app/Repositories/DosenRepository.php';


    // Database
    $database = new Database();


    // Repository Mahasiswa
    $mahasiswaRepository =
        new MahasiswaRepository($database);


    // Repository Dosen
    $dosenRepository =
        new DosenRepository($database);


    // Controller
    $controller = new MahasiswaController(
        $mahasiswaRepository,
        $dosenRepository
    );


    // ID dari URL
    $id = $matches[1];


    // Jalankan show
    $controller->show($id);


// ==================================================
// 404
// ==================================================

} else {

    http_response_code(404);

    echo "404 - Halaman tidak ditemukan";
}