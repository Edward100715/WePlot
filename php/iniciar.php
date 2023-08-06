<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WePlot</title>
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/main.js"></script>
</head>

<body>
    <div>
        <!-- Un contenedor div principal -->

        <div id="divp">
            <!-- Un div con el id "divp" que podría contener algún tipo de contenido, como una imagen -->
            <img src="../assets/img/Titulo.png" alt="">
            <!-- Aquí se muestra una imagen con una ruta relativa "../assets/img/Titulo.png" -->
            <!-- La imagen es identificada por su fuente (src) y se proporciona un texto alternativo (alt) en caso de que la imagen no se pueda cargar -->
        </div>

        <div id="div-buttons">
            <!-- Otro div con el id "div-buttons" que podría contener botones u otro contenido relacionado -->
            <button id="btnp" id="princ" onclick="princ()">Inicio</button>
            <!-- Aquí se muestra un botón con el identificador "btnp" y "princ" -->
            <!-- El botón tiene un evento onclick que llama a la función "princ()" cuando se hace clic en él -->
        </div>

    </div>
    <div>
        <!-- Formulario de inicio de sesión -->
        <form class="inic-formulario" method="post" action="iniciar.php">
            <h2>Iniciar Sesión</h2>
            <!-- Campo de entrada para el nombre de usuario -->
            <p>Usuario: </p>
            <input type="text" name="nombre" placeholder="nombre" required><br><br>

            <!-- Campo de entrada para la contraseña -->
            <p>Contraseña: </p>
            <input type="password" name="contraseña" placeholder="contraseña" required><br><br>

            <!-- Botón de envío del formulario -->
            <input type="submit" value="Iniciar Sesión">
        </form>
    </div>

</body>

</html>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('conexion.php');

    $nombre = $_POST["nombre"];
    $contraseña = $_POST["contraseña"];

    // Consulta para seleccionar datos de la tabla "usuarios" basados en el nombre
    $query = "SELECT * FROM usuarios WHERE nombre = ?";

    // Preparar la sentencia SQL y vincular el parámetro del nombre
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $nombre);
    mysqli_stmt_execute($stmt);

    // Obtener el resultado de la consulta
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        // Si se encontraron resultados y hay al menos una fila en el resultado

        $row = mysqli_fetch_assoc($result);
        // Obtener una fila de resultado como un arreglo asociativo
        $contraseñaAlmacenada = $row['contraseña'];
        $rol = $row['rol'];

        if (password_verify($contraseña, $contraseñaAlmacenada)) {
            // Si la contraseña ingresada coincide con la contraseña almacenada después de descifrarla con password_verify()

            $_SESSION['nombre'] = $nombre;
            $_SESSION['rol'] = $rol;  // Almacena el rol en la sesión

            // Redirigir según el rol
            if ($rol === "admin") {
                header("Location: admin.php");
                exit();
            } elseif ($rol === "user") {
                header("Location: datosp.php");
                exit();
            }
        } else {
            // Si las contraseñas no coinciden, mostrar un mensaje de error
            echo "<script>alert('Inicio de sesión fallido. Verifica tu contraseña.');</script>";
        }
    } else {
        // Si no se encontraron resultados, mostrar un mensaje de error
        echo "<script>alert('Inicio de sesión fallido. Usuario no encontrado.');</script>";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>