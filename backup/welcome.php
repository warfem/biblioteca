<?php

if (isset($_POST['acceder'])) {
    
    require 'conexion.php';
    //Iniciamos sesión
    session_start();
    
    $_SESSION['user'] = $_POST['id'];
    $_SESSION['password'] = $_POST['password'];
    $nombreUsuario = $_SESSION['user'];
    $pass = $_SESSION['password'];
    
    /* Creamos una query para comprobar los usuarios y la contraseña*/
    
    $conn = conecDB();
    
    $consulta = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario = '$nombreUsuario'");
    $row = mysqli_fetch_array($consulta,MYSQLI_ASSOC);
    $hash = $row['contraseña'];
    
    /*Si la contraseña esta correcta te vuelva a la página inicial
      sino el usuario no existe
    */ 
    if (password_verify($pass, $hash)) {
        header("Location: index.php");
    }else{
        echo "Usuario no existe: " . $nombreUsuario . ", o la contraseña es incorrecta  o hubo un error: " . mysqli_error($conn);
    }
    /*Si el usuario esta vacio te lo ponga*/ 
    if(empty($_POST['id']) || empty($_POST['password'])){
        
       echo"Campo Usuario o  Contraseña vacios";
    }
    
}
if (isset($_POST['registro'])) {
    header('Location: registro.php');
}


?>
<!-- Añadimos el form para hacer el logout -->
<form action = "<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="POST">
	<button type="submit" value="Desconectar" name="logout"> Logout </button>
 </form>
 <!-- Añadimos el form para hacer el logout -->
    <?php
    if(isset($_POST['logout'])){
              session_start();
              unset($_SESSION['user']);
              session_destroy();
              header("location:index.php");
            }
    ?>
