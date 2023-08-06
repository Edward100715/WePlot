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

    <!-- Se inicia una tabla con la clase "tabla-usuarios" para mostrar información de usuarios -->
    <table class="tabla-usuarios">
        <!-- La cabecera de la tabla (thead) define las columnas de la tabla -->
        <thead>
            <tr>
                <!-- Se definen los encabezados de las columnas -->
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Pais</th>
                <th>Pregunta 1</th>
                <th>Pregunta 2</th>
                <th>Pregunta 3</th>
                <th>Pregunta 4</th>
                <th>Contraseña</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <!-- Aquí irían los datos de los usuarios en el cuerpo de la tabla (tbody) -->
    </table>

    <tbody>
        <?php
        // Se incluye el archivo "conexion.php" que debe contener la conexión a la base de datos
        include('conexion.php');

        // Se realiza una consulta SQL para seleccionar todos los registros de la tabla "usuarios" y ordenarlos por el campo "id" de forma ascendente
        $query = "SELECT * FROM usuarios ORDER BY id ASC";

        // Se ejecuta la consulta y se obtiene el resultado
        $result = mysqli_query($conn, $query);

        // Se itera sobre cada fila del resultado obtenido y se muestran los datos en la tabla
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <!-- Se muestran los datos de cada columna en cada fila de la tabla -->
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['nombre'] ?></td>
                <td><?php echo $row['apellido'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['telefono'] ?></td>
                <td><?php echo $row['pais'] ?></td>
                <td><?php echo $row['pregunta1'] ?></td>
                <td><?php echo $row['pregunta2'] ?></td>
                <td><?php echo $row['pregunta3'] ?></td>
                <td><?php echo $row['pregunta4'] ?></td>
                <td><?php echo $row['contraseña'] ?></td>
                <td><?php echo $row['foto_perfil'] ?></td>
                <td>
                    <!-- Se muestra un enlace (hipervínculo) para eliminar el registro específico -->
                    <a id="eli" href="delete.php?id=<?php echo $row['id'] ?>">
                        Eliminar
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
    </table>


    </table>
</body>

</html>