<?php

function conecDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "biblioteca";
    
    // Crear la conexión
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    return $conn;
}

