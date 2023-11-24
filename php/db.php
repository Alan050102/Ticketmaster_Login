<?php

    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'ticketmaster' //Base de datos 
    );

    if(isset($conn)){
        echo "Se ha conectado a la BD correctamente ";
    } else {
        echo "Sin conexión a BD ";
    }

?>