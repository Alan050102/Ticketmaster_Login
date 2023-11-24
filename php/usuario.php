<?php

include("db.php");

if(isset($_POST['guardar_usuario'])) {
    $nombre = $_POST['username'];
    $contraseña = $_POST['password'];

        // Si no existe un usuario con el mismo user_id ni con el mismo correo electrónico, insertar los datos
        $query = "INSERT INTO usuarios(nombre,contraseña) 
        VALUES('$nombre','$contraseña')";
        $result = mysqli_query($conn,$query);

        if(!$result) {
            die("Error en Query");
        } else {
            $_SESSION['mensaje'] = "Usuario Guardado";
            $_SESSION['color'] = "success";
            echo "Usuario Guardado";
            header('Location: .././index.html');
        }
}

?>