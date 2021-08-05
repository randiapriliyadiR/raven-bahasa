<?php

    // Jika seandainya menggunakan server bawaan PHP 5.4+
    $filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
    if (php_sapi_name() === 'cli-server' && is_file($filename)) {
        return false;
    }

    // Sertakan kelas Router
     // @note: disarankan untuk menggunakan autoloader komposer saat bekerja dengan paket lain juga
    require __DIR__ . '/vendor/autoload.php';
    require __DIR__ . '/setelan/autoload.php';

    /**
     * Router Multibahasa
     */
    class MultibahasaRouter extends \Bramus\Router\Router
    {
        /**
         * Bahasa Bawaan
         * @var string
         */
        private $bahasabawaan;

        /**
         * Daftar bahasa yang diizinkan
         * @var array
         */
        private $bahasaDiizinkan = array();

        /**
         * Router Multibahasa
         * @param array  $bahasaDiizinkan
         * @param string $bahasabawaan
         */
        public function __construct(array $bahasaDiizinkan, $bahasabawaan)
        {

            // Menyimpan data yang diteruskan
            $this->bahasaTerizinkan = $bahasaDiizinkan;
            $this->bahasaBawaan = (in_array($bahasabawaan, $bahasaDiizinkan) ? $bahasabawaan : $bahasaDiizinkan[0]);

            // Pergi ke dasar untuk Redirect ke indeks bahasa bawaan
            $this->match('GET|POST|PUT|DELETE|HEAD', '/', function () {
                header('location: ' . $this->bahasaBawaan);
                exit();
            });

            // Buat penangan sebelum untuk memastikan bahasa diperiksa saat mengunjungi apa pun kecuali root.
            // Jika bahasa tidak keluar, arahkan ke indeks bahasa bawaan
            $this->before('GET|POST|PUT|DELETE|HEAD', '/([a-z0-9_-]+)(/.*)?', function ($bahasa, $slug = null) {

                // Jika bahasa yang diberikan tidak muncul dalam susunan bahasa yang diizinkan
                if (!in_array($bahasa, $this->bahasaTerizinkan)) {
                    header('location: ' . $this->bahasaBawaan);
                    exit();
                }
            });
        }
    }

    // Buat Router
    $router = new MultibahasaRouter(
        array('en','id'), //= bahasa yang diizinkan
        'id' // = bahasa bawaan
    );

Router::routing($router);

    // Jalankan
    $router->run();
