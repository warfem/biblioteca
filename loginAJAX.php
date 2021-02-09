<?php
    require 'conexion.php';
    //Iniciamos sesión
    session_start();
    
    $_SESSION['user'] = $_POST['usuario'];
    $_SESSION['password'] = $_POST['pass'];
    $nombreUsuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    
    /* Creamos una query para comprobar los usuarios y la contraseña*/
    
    $conn = conecDB();
    
    $consulta = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario = '$nombreUsuario'");


if(mysqli_num_rows($consulta) > 0){

    $row = mysqli_fetch_array($consulta,MYSQLI_ASSOC);
    $hash = $row['contraseña'];
    
    /*Si la contraseña esta correcta te vuelva a la página inicial
     sino el usuario no existe
     */
    if (password_verify($pass, $hash)) {
        $_SESSION['user'] = $_POST['usuario'];
        $_SESSION['password'] = $_POST['pass'];
     
    }else{
        echo "ESTE NO CONECTA";
        /*echo "Usuario no existe: " . $nombreUsuario . ", o la contraseña es incorrecta  o hubo un error: " . mysqli_error($conn);*/
    }
    /*Si el usuario esta vacio te lo ponga*/
    if(empty($_POST['usuario']) || empty($_POST['pass'])){
        
        echo"Campo Usuario o  Contraseña vacios";
    }
    
}else{
    echo " NO FUNCIONAAA";
}


?>