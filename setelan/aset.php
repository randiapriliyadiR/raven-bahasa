<?php 
// kumpulan aset yang akan digunakan
class Aset{
    // ikon website
    function icon(){
        $icon = array(
            "favicon.ico"=>"shortcut icon",
        );
        return $icon;
    }
    // file css
    function css(){
        $css = array(
            "vendor/twbs/bootstrap/dist/css/bootstrap.min.css"=>"stylesheet",
            "vendor/fortawesome/font-awesome/css/all.min.css"=>"stylesheet",
        );
        return $css;
    }
    // file js
    function js(){
        $js = array(
            "vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js",
            "vendor/components/jquery/jquery.min.js",
            "vendor/fortawesome/font-awesome/js/all.min.js",
        );
        return $js;
    }
}
?>