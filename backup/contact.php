<?php 
session_start();
include 'conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styleContact.css" rel="stylesheet" type="text/css" title="Color" />
    <title>Biblioteca Lenaus</title>
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
    
        <div class="contenido">
            <h2>Nuestros datos</h2>
            <p>Dirección: Vía Roma,1</p>
            <p>Código Postal: 07012</p>
            <p>Teléfono: 971 21 95 36 </p>

            <h2>Envianos tus sugerencias</h2>
            <form action = "mailing.php" enctype="multipart/form-data" method="POST">
            <div class="email">
            	<label>Email:</label>
            	<input type="email" name="emailSug">
            </div>
            	<textarea>
            	</textarea>
            	<button type="submit" value="enviarSug" name="enviarSug"> Enviar Sugerencias</button>
            </form>
        </div>

        <div class="mapa">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d24593.27491859656!2d2.6023713737304677!3d39.60109235507249!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12979259f6879015%3A0x8130b8439e116b7!2sBiblioteca%20de%20Cultura%20Artesana!5e0!3m2!1ses!2ses!4v1606069735673!5m2!1ses!2ses" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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