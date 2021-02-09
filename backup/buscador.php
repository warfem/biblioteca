<?php

   
if(isset($_POST['btnBuscar'])){
   /*Conectamos con la base de datos*/
    require 'conexion.php';
    $conn = conecDB();
    
    $datosBusqueda = $_POST['buscarLibro'];
    
    $queryAutor = "SELECT autor,titulo,editorial,genero,id_libro,sinopsis FROM libro WHERE autor LIKE '%$datosBusqueda%' ";
    $queryTitulo = "SELECT autor,titulo,editorial,genero,id_libro,sinopsis FROM libro WHERE titulo LIKE '%$datosBusqueda%' ";
    
    $consulta = mysqli_query($conn,$queryAutor);
    $consultaB = mysqli_query($conn,$queryTitulo);
    
    
    /*Hacemos un bucle para mostrar todos lso datos de los libros buscados por Autor*/ 

    while ($filaAutor = $consulta->fetch_array()) {
        echo"<hr><br> ";
        echo"<h2>$filaAutor[1]</h2>";//titulo
        echo "<img src='img/libros/libro$filaAutor[4].jpg'class='imgLibro'>";
        echo "<p><strong>Autor:</strong> $filaAutor[0]</p> ";//Autor    
        echo "<p><strong> Editorial:</strong> $filaAutor[2]</p> ";//editorial
        echo "<p><strong>Genero:</strong> $filaAutor[3]</p> ";//genero
        echo"<h2>SINOPSIS</h2>";
        echo"<p class='resumen'>$filaAutor[5]</p>";
        if(!empty($_SESSION["user"])){
            echo '<form action="" method="post">';
                echo"<button type='submit' class='brnReserva'name='reserva'>Enviar</button><br>";
            echo"</form>";
        }
        echo"<hr><br> ";
       
   
    }
    /*Hacemos un bucle para mostrar todos los datos de los libros buscados por Titulo*/ 
    
    if($datosBusqueda != ""){
        while ($filaTitulo = $consultaB->fetch_array()) {
            echo"<hr><br> ";
            echo"<h2>$filaTitulo[1]</h2>";//titulo
            echo "<img src='img/libros/libro$filaTitulo[4].jpg'class='imgLibro'> ";
            echo "<p><strong>Autor:</strong> $filaTitulo[0]</p> ";//Autor
            echo "<p><strong> Editorial:</strong> $filaTitulo[2]</p> ";//editorial
            echo "<p><strong>Genero:</strong> $filaTitulo[3]</p> ";//genero
            echo"<h2>SINOPSIS</h2>";
            echo"<p class='resumen'>$filaTitulo[5]</p>";
            if(!empty($_SESSION["user"])){
                echo '<form action="" method="post">';
                    echo"<button type='submit' class='brnReserva' name='reserva'>Enviar</button><br>";
                echo"</form>";
            }
            echo"<hr><br> ";


        }
    }    

}


/*Si e realizar la reserva*/