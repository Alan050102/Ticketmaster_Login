<?php

session_start();
include("db.php");


if (isset($_POST['iniciar_sesion'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Realizar consulta para verificar el usuario y contraseña en la base de datos
    $consulta = "SELECT * FROM usuarios WHERE nombre = '$username' AND contraseña = '$password'";
    $resultado = mysqli_query($conn, $consulta);

    if (mysqli_num_rows($resultado) == 1) {
        // Las credenciales son correctas
        echo "success";
    } else {
        // Las credenciales son incorrectas
        echo "failure";
    }
} else {
    // No se recibieron datos válidos
    echo "error";
}
?>

