<?php 
class Router{
    function routing($router){
        $router->get('/([a-z0-9_-]+)', function ($bahasa) {
            $bahasa=htmlentities($bahasa);
            include 'tampilan/utama.php';
            // exit('Ini adalah bahasa ' . htmlentities($bahasa) . ' untuk halaman index');
        });
    
        $router->get('/([a-z0-9_-]+)/([a-z0-9_-]+)', function ($bahasa, $slug) {
            exit('Ini adalah bahasa ' . htmlentities($bahasa) . ' versi ' . htmlentities($slug));
        });
    
        $router->get('/([a-z0-9_-]+)/(.*)', function ($bahasa, $slug) {
            exit('Ini adalah bahasa ' . htmlentities($bahasa) . ' versi ' . htmlentities($slug) . ' (beberapa kata diperbolehkan)');
        });
    }
}
?>