<?php 
session_start();
include 'conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styleAdminLibros.css" rel="stylesheet" type="text/css" title="Color" />
    <title>Biblioteca Lenaus</title>
</head>
<body>
<div class="container">
    <div class="header">
        <a href="index.php"> <img src="img/libro2.jpg"></a>
        <h1>Lenaus Biblioteca</h1>
           
        <div class="login"> 
        <form action="welcome.php" method="$_GET">
	       <table style="border: 1px solid black; margin-left: 250px;">
                <!-- Añadimos los trs y tds con los inputs correspondientes. -->
                <tr>
                    <td style="width: 70%">
                    <?php
                    
                    if (!empty($_SESSION["user"])) {
                        echo"<label>".$_SESSION['user'] ."</label>";
                  
                    ?>
                  		<button type="submit" value="Desconectar" onclick="logout()"name="logout"> Logout </button>
                  		
                    </td>
                </tr> 
                    <?php 
                    }else{
                        
                    ?>
                     <tr>
                    <td style="width: 30%">User:</td>
                        
                    <td style="width: 70%">
                        <input type="text" name="id" id="id">
                    </td>
                </tr>
                <tr>
                    <td style="width: 30%">Password:</td>
                    <td style="width: 70%">
                        <input type="password" name="password" id="password">
                    </td>
                </tr>
                
                <tr>
                    <td style="width: 30%"></td>
                    <td style="width: 70%;">
                <!-- Creamos el boton para acceder al usuario -->
                    <button type="submit" value="acceder" onclick="loguear()" name="acceder">acceder</button>
                    <button type="submit" value="registro" name="registro">registrate</button>
             		    
                    </td>
                </tr>
                  <?php 
                    }
                  
                  ?>           
            </table>
        </form>
        </div>
        
    </div>

   <div class="nav">
        <ol>
             <li><a href="index.php">Inicio</a></li>
            <li><a href="libros.php">Libros</a></li>
           <li><a href="contact.php">Contactenos</a></li>
            <?php
            /* En caso de que sean estos usuarios añadira otro li para que puedan ir a datos. */
            if(isset($_SESSION["user"])){
                if($_SESSION['user'] == "root"||$_SESSION['user'] == "bibliotecario"){
            ?>
            <li><a href="adminLibros.php">Administrar</a></li>
        
        <?php
                }
            }
        ?>
        </ol>
    </div>

    <div class="datos">
    
        <div class="contenido">
        
            <form action = "<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="POST">
                <h2>Funciones de Administrador</h2>
                <button type="submit" name="addLibro">Añadir libro</button><br>
                <button type="submit" name="modLibro">Modificar libro</button><br>
                <button type="submit" name="delLibro">Eliminar libro</button><br>
            	<button type="submit" name="delUser">Eliminar Usuario</button><br>
            </form>
        </div>

        <div class="opciones">
        <?php
         include'opcAdminLibros.php';
        ?>
           
        </div>
        
    </div>
        

    <div class="footer">
        <p >
            <a href="http:\\www.google.com"><img src="img/gmail.png" width="30px"></a>&emsp;
            <a href="http:\\www.facebook.com"><img src="img/facebook.png" width="30px"></a>&emsp;
            <a href="http:\\www.instagram.com"><img src="img/instragram.png" width="30px"></a>&emsp;
            <a href="http:\\www.twitter.com"><img src="img/gorjeo.png" width="30px"></a>
            
        </p>
        <h1>CopyRight</h1>
    </div>   
</div>

</body>
</html>