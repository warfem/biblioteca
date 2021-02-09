<?php

if(isset($_POST['addLibro'])){//Formulario para añadir libros en la BD

    echo '<form action="" method="post">';
    echo'<label>Autor:</label>';
    echo"<input type='text' name='autor'><br>";
    echo"<label>Titulo:</label>";
    echo"<input type='text' name='titulo'><br>";
    echo"<label>Editorial:</label>";
    echo" <input type='text' name='editorial'><br>";
    echo"<label>Genero:</label>";
    echo"<input type='text' name='genero'><br>";
    echo"<label>Fecha:</label>";
    echo"<input type='date' name='fecha'><br><br>";
    echo"<label>Sinopsis:</label><br>";
    echo" <input type='text' name='sinopsis' style='width: 400px; height: 200px; margin-left: 10px;'>";
    echo"<button type='submit' name='enviarAdd'>Enviar</button><br>";
    echo"</form>";

}else if(isset($_POST['modLibro'])){ //Formulario para modificar los libros de la BD
    echo '<form action="" method="post">';
    echo"<label>idLibro:</label>";
    echo"<input type='text' name='idLibro' required><br>";
    echo"<label>Autor:</label>";
    echo"<input type='text' name='autor' required><br>";
    echo"<label>Titulo:</label>";
    echo"<input type='text' name='titulo' required><br>";
    echo"<label>Editorial:</label>";
    echo" <input type='text' name='editorial' required><br>";
    echo"<label>Genero:</label>";
    echo"<input type='text' name='genero' required><br>";
    echo"<label>Fecha:</label>";
    echo"<input type='date' name='fecha' required><br><br>";
    echo"<label>Sinopsis:</label><br>";
    echo" <input type='text' name='sinopsis' style='width: 400px; height: 200px; margin-left: 10px;'>";
    echo"<button type='submit' name='enviarMod'>Enviar</button><br>";
    echo"</form>";
     
}else if(isset($_POST['delLibro'])){//Formulario para eliminar libros de la BD
    echo '<form action="" method="post">';
    echo"<label>idLibro:</label>";
    echo"<input type='text' name='idLibro' required><br>";
    echo"<label>Titulo:</label>";
    echo"<input type='text' name='titulo' required><br>";
    echo"<button type='submit' name='enviarDel'>Enviar</button><br>";
    echo"</form>";
    
}else if(isset($_POST['delUser'])){//Formuarlio para eliminar users de la BD
    echo '<form action="" method="post">';
    echo"<label>Id Usuario:</label>";
    echo"<input type='text' name='idUser'><br>";
    echo"<label>Nombre:</label>";
    echo"<input type='text' name='nombreUser'><br>";
    echo"<label>Apellidos:</label>";
    echo"<input type='text' name='apeUser'><br>";
    echo"<button type='submit' name='enviarDelUser'>Enviar</button><br>";
    echo"</form>";
    
}


// Crear la conexión
$conn = conecDB();

//Añadir los datos a la BD
if(isset($_POST['enviarAdd'])){//Añadir libros de la BD
  
    $autor = $_POST['autor'];
    $titulo = $_POST['titulo'];
    $editorial = $_POST['editorial'];
    $genero = $_POST['genero'];
    $fecha = $_POST['fecha'];
    $sinopsis = $_POST['sinopsis'];
    
    
    $addDatos ="INSERT INTO libro(autor, titulo, editorial, genero, fechaPublicacion, Sinopsis)
    VALUES('$autor','$titulo','$editorial','$genero','$fecha','$sinopsis')";
      
    if(mysqli_query($conn, $addDatos)){
        
        echo"<p>Datos insertados correctamente</p>";
    }else{
        echo"<p>ERROR:".$addDatos."<br>".mysqli_error($conn).")</p>";
    }
      
}

//Modificamos los datos de nuestra BD
if(isset($_POST['enviarMod'])){//Añadir libros de la BD
    $idLibro = $_POST['idLibro'];
    $autor = $_POST['autor'];
    $titulo = $_POST['titulo'];
    $editorial = $_POST['editorial'];
    $genero = $_POST['genero'];
    $fecha = $_POST['fecha'];
    $sinopsis = $_POST['sinopsis'];
    
    $modDatos ="UPDATE libro SET autor='".$autor."',titulo='".$titulo."',editorial='".$editorial."',genero='".$genero."',fechaPublicacion='".$fecha."',Sinopsis='".$sinopsis."'
    WHERE id_libro='".$idLibro."'";
    
    if(mysqli_query($conn, $modDatos)){
        
        echo"<p>Datos modificados correctamente</p>";
    }else{
        echo"<p>ERROR:".$modDatos."<br>".mysqli_error($conn).")</p>";
    }
    
}

//Eliminar Usuario de la BD
if(isset($_POST['enviarDelUser'])){//Añadir libros de la BD
    $idUser = $_POST['idUser'];

    $delUser ="DELETE FROM usuarios  WHERE id_usuario='".$idUser."'";
    
    if(mysqli_query($conn, $delUser)){
        
        echo"<p>Usuario eliminados correctamente</p>";
    }else{
        echo"<p>ERROR:".$delUser."<br>".mysqli_error($conn).")</p>";
    }
    
}





