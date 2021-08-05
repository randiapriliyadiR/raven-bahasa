<?php 
// basis data
class Database{
    // mysqli
    function mysqli(){
        $mysqli=mysqli_connect('localhost','root','','akuntansi');
        return $mysqli;
    }
}
?>