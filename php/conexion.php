<?php
/* Conexion con la base de datos */

// Se definen los parámetros de conexión a la base de datos
$server = 'localhost'; // El servidor donde se encuentra la base de datos (puede ser una dirección IP)
$user = 'root'; // El nombre de usuario de la base de datos
$password = ''; // La contraseña del usuario de la base de datos (en este caso, está vacía)
$dbname = 'usuarios'; // El nombre de la base de datos a la que se desea conectar

try {
    // Se intenta establecer una conexión a la base de datos utilizando la función mysqli_connect()
    $conn = mysqli_connect($server, $user, $password, $dbname);

    // Se verifica si la conexión se estableció correctamente
    if (!$conn) {
        // Si la conexión no se estableció, se muestra un mensaje de error y se finaliza el script
        die("Conexión no establecida: " . mysqli_connect_error());
    }
} catch (ErrorException $e) {
    // En caso de que ocurra una excepción, se captura y se muestra el mensaje de la excepción
    echo $e->getMessage();
}