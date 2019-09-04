<?php 

    session_start();

            // mysqli_connect() => Librería de MySQL que realiza la conección.
    $conn = mysqli_connect(
        'localhost',//Ruta se conección a la DB
        'root',// Usuario de la DB
        '',// Contraseña DB
        'fazt-crud-php'// Nombre de la DB
    );
    
?>