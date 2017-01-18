<?php
    $server = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "SundayLeague";

    $conn = new mysqli($server,$username,$password,$dbname);

    return $conn;

   

?>