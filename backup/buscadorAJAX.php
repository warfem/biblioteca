<?php
require 'conexion.php';
$conn = conecDB();

$datosBusqueda = $_GET['buscarLibro'];

$libros=str_split($datosBusqueda);


if(count($libros) >= 3 ){

    $queryLibro = "SELECT titulo FROM libro WHERE titulo LIKE '%$datosBusqueda%' ";  
    $queryAutor = "SELECT autor FROM libro WHERE autor LIKE '%$datosBusqueda%' limit 1";
    
    $consulta = mysqli_query($conn,$queryLibro);
    $consultaB = mysqli_query($conn, $queryAutor);

    while ($filaLibro = $consulta->fetch_array()) {
        
        echo"Sugerencia Libro: ".$filaLibro["titulo"]."<br>";
    }
    
    while ($filaLibro = $consultaB->fetch_array()) {
        
        echo"Sugerencia Autor: ".$filaLibro["autor"]."<br>";
    }
    

} 