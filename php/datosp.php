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
    <?php
    session_start(); // Iniciar la sesión para utilizar variables de sesión

    // Verificar si los datos están almacenados en la sesión
    if (isset($_SESSION['nombre']) && isset($_SESSION['contraseña'])) {
        include('conexion.php'); // Incluir el archivo de conexión a la base de datos

        $nombre = $_SESSION['nombre']; // Obtener el nombre de usuario de la sesión
        $query = "SELECT * FROM usuarios WHERE nombre = '$nombre'"; // Consulta SQL para obtener los datos del usuario
        $result = mysqli_query($conn, $query); // Ejecutar la consulta

        // Verificar si la consulta fue exitosa y si se obtuvieron resultados
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result); // Obtener los datos del usuario en un arreglo
    ?>
            <!-- Mostrar los detalles del usuario en un div con la clase "datos" -->
            <div class="datos">
                <p>ID: <?php echo $row['id']; ?></p>
                <p>Nombre: <?php echo $row['nombre']; ?></p>
                <p>Apellido: <?php echo $row['apellido']; ?></p>
                <p>Email: <?php echo $row['email']; ?></p>
                <p>Teléfono: <?php echo $row['telefono']; ?></p>
                <p>País: <?php echo $row['pais']; ?></p>
                <p>Pregunta 1: <?php echo $row['pregunta1']; ?></p>
                <p>Pregunta 2: <?php echo $row['pregunta2']; ?></p>
                <p>Pregunta 3: <?php echo $row['pregunta3']; ?></p>
                <p>Pregunta 4: <?php echo $row['pregunta4']; ?></p>
                <p>Contraseña: <?php echo $row['contraseña']; ?></p>
                <!-- No debes mostrar la contraseña en producción, esto es solo para demostración -->
                <p>Foto de perfil: <img src="<?php echo $row['foto_perfil']; ?>" alt="Foto de perfil"></p>
            </div>
    <?php
        } else {
            echo "Usuario no encontrado en la base de datos."; // Mostrar mensaje si el usuario no se encuentra
        }

        $conn->close(); // Cerrar la conexión a la base de datos
    } else {
        echo "Los datos no están disponibles."; // Mostrar mensaje si los datos de sesión no están presentes
    }
    ?>

    </div>
</body>

</html>