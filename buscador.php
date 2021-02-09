<?php
  require 'conexion.php';
  $conn = conecDB();
if(isset($_POST['btnBuscar'])){
   /*Conectamos con la base de datos*/
  
    
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
        if(!empty($_SESSION["user"])){ //Si el usuario esta conectado puede realizar la reserva
            echo '<form action="" method="GET">';
                echo"<a href='$_SERVER[PHP_SELF]?idReserva=$filaAutor[4]'><button type='submit' class='btnReserva' name='btnReserva'>Reservar </button></a><br>";
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
            if(!empty($_SESSION["user"])){//Si el usuario esta conectado puede realizar la reserva con el href le pasamos el valor de la id para saber que libro cogen
                echo '<form action="" method="GET">';
                    echo"<a href='$_SERVER[PHP_SELF]?idReserva='$filaTitulo[4]''><button type='submit' class='btnReserva' name='btnReserva'>Reservar </button></a><br>";
                echo"</form>";
            }
            echo"<hr><br> ";


        }
    }    

}


/*En caso que quiera reservar cogemos el valor de la id gracias al link*/

if(isset($_GET['btnReserva'])){
    /*Conectamos con la base de datos */
    
    /*Cogemos los valores del usuario y la id del libro para obtener el nombre*/
    $nombreUsuario = $_SESSION['user'];
   
    /*$idLibro = $_GET['idReserva'];*/
    $fecha_actual = date("Y-m-d");
    $fecha_devolucion ="DATE_ADD('$fecha_actual',INTERVAL 15 DAY)";

    $queryTitulo = mysqli_query($conn, "UPDATE libro SET cantidad = (SELECT cantidad FROM libro where id_libro='$codigo')-1 WHERE id_libro = '$codigo'");
    $queryReserva = mysqli_query($conn,"INSERT INTO reserva VALUES('$nombreUsario','$codigo','$fecha_actual','$fecha_devolucion')");

}


/*if(isset($_GET['btnReserva'])){
    /*Conectamos con la base de datos y con la sesión de usuario
    require 'conexion.php';
    $conn = conecDB();
    session_start();
    
    /*Cogemos los valores del usuario y la id del libro para obtener el nombre
    $_SESSION['user'] = $_POST['id'];
    $nombreUsuario = $_SESSION['user'];

    $idLibro = $_GET['idReserva'];

    $queryNombre = mysqli_query($conn, "SELECT Nombre,apellidos FROM usuarios WHERE id_usuario = '$nombreUsuario'"); // Obtenemos nombre y apellidos
    $queryTitulo = mysqli_query($conn, "SELECT titulo FROM libro WHERE id_libro = '$$idLibro'");

}*/