<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/styleRegistro.css" rel="stylesheet" type="text/css" title="Color"/>
<title>Registro Usuario</title>
</head>
<body>
<div class="container">
    <div class="header">
        <a href="index.php"> <img src="img/libro2.jpg"></a>
        <h1>Lenaus Biblioteca</h1>
           
        <div class="login">
         <form action="welcome.php" method="POST">
	       <table style="border: 1px solid black; margin-left: 250px;">
                <!-- Añadimos los trs y tds con los inputs correspondientes. -->
                <tr>
                    <td style="width: 70%">
                    <?php
                    
                    if (!empty($_SESSION["user"])) {
                        echo"<label>".$_SESSION['user'] ."</label>";
                  
                    ?>
                  		<button type="submit" value="Desconectar" onclick="logout()" name="logout"> Logout </button>
                  		
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
                        <p id="resultado"></p>
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
	<h1> Añadir Datos</h1>

	<form action = "<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="POST">
        
    
	<table>
		<!-- Añadimos los trs y tds con los inputs correspondientes. -->
			<tr>
				<td style="width: 30%">Nombre:</td>
				
				<td style="width: 70%">
					<input type="text" name="nombre" required>
				</td>
			</tr>
			<tr>
				<td style="width: 30%">Apellidos:</td>
				<td style="width: 70%">
					<input type="text" name="apellidos">
				</td>
			</tr>
			<tr>
				<td style="width: 30%">Fecha de Nacimiento:</td>
				<td style="width: 70%">
					<input type="date" name="fechaNacimiento">
				</td>
			</tr>
			
			<tr>
				<td style="width: 30%">Dirección:</td>
				<td style="width: 70%">
					<input type="text" name="direccion">
				</td>
			</tr>
			
			<tr>
				<td style="width: 30%">email:</td>
				<td style="width: 70%">
					<input type="email" name="email" required>
				</td>
			</tr>
			
			<tr>
				<td style="width: 30%">Población:</td>
				<td style="width: 70%">
					<input type="text" name="poblacion">
				</td>
			</tr>
			<tr>
				<td style="width: 30%">Código postal:</td>
				<td style="width: 70%">
					<input type="text" name="cp">
				</td>
			</tr>
			<tr>
				<td style="width: 30%">Usuario:</td>
				<td style="width: 70%">
					<input type="text" name="usuario" required>
				</td>
			</tr>
			<tr>
				<td style="width: 30%">Password:</td>
				<td style="width: 70%">
					<input type="password" name="pass" required>
				</td>
			</tr>
		
			<tr>
				<td style="width: 30%"></td>
				
				<td style="width: 70%;">
				
				<!-- Creamos el boton para acceder crear coche -->
				<button type="submit" value="acceder" name="addUser">Registrate</button>
				</td>
			</tr>
        
        </table>
 	</form>
 	<form action = "<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="POST"> 
				<button type="submit" value="acceder" name="volver">Volver atras!</button>
	</form>
</div >


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


<?php
require 'conexion.php';

// Crear la conexión
$conn = conecDB();

/* Creamos los datos y los enviamos a la BD*/

if (isset($_POST['addUser'])){

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $fechaNacimiento =$_POST['fechaNacimiento'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $poblacion = $_POST['poblacion'];
    $cp = $_POST['cp'];
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    
    $hash= password_hash($pass,PASSWORD_DEFAULT);
  
    
    
    $addDatos ="INSERT INTO usuarios(nombre, apellidos, fechaNacimiento, direccion, email, poblacion,CP,usuario,contraseña) 
    VALUES('$nombre','$apellidos','$fechaNacimiento','$direccion','$email','$poblacion','$cp','$usuario','$hash')";
				    
    
    if(mysqli_query($conn, $addDatos)){
        
        echo"Datos insertados correctamente";
    }else{
        echo"ERROR:".$addDatos."<br>".mysqli_error($conn).")";
    }
    
  
}

if(isset($_POST['volver'])){
    
    /*Utilizamos este código en js para poder volver a la página de inicio ya que con php nos daba problemas con header*/ 
    echo "<script>window.setTimeout(function() { window.location = 'index.php' }, 1);</script>";
}

?>

</body>
</html>



