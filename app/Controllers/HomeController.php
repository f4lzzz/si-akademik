<?php

class HomeController
{
    public function index()
    {
        echo "
        <!DOCTYPE html>
        <html lang='id'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Sistem Akademik</title>

            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
        </head>

        <body>

            <div class='container mt-5'>

                <div class='card shadow'>
                    <div class='card-body text-center'>

                        <h1 class='mb-3'>
                            Selamat Datang di Sistem Akademik
                        </h1>

                        <p class='text-muted mb-4'>
                            Halaman Home berhasil menggunakan Routing.
                        </p>

                        <a href='/si-akademik/public/mahasiswa'
                           class='btn btn-primary me-2'>
                            Data Mahasiswa
                        </a>

                        <a href='/si-akademik/public/dosen'
                           class='btn btn-secondary'>
                            Data Dosen
                        </a>

                    </div>
                </div>

            </div>

        </body>
        </html>
        ";
    }
}