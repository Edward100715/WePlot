<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WePlot</title>
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/main.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
    <div class="contenedor">
        <div class="imagen-formulario-container">
            <div class="imagen-container">
                <img src="../assets/img/P1.png" alt="Imagen" class="imagen">
            </div>
            <div class="formulario-container">
                <div class="formulario">
                    <img src="../assets/img/Titulototal.png" alt="">
                    <!-- Formulario con los datos para agregarlos en la base de datos usuarios -->
                    <form method="post" name="form" enctype="multipart/form-data" action="registro.php">
                        <div class="campo-container">
                            <div class="campo">
                                <p>Nombre*</p>
                                <input type="text" name="nombre" autocomplete="off" required>
                            </div>
                            <div class="campo">
                                <p>Apellido</p>
                                <input type="text" name="apellido" autocomplete="off">
                            </div>
                        </div>
                        <div class="campo-container">
                            <div class="campo">
                                <p>Email*</p>
                                <input type="email" name="email" autocomplete="on" required>
                            </div>
                            <div class="campo">
                                <p>Telefono*</p>
                                <input type="number" name="telefono" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="campo-container" id="campo-container2">
                            <div class="campo" id="campo2">
                                <p>Pais</p>
                                <input type="text" name="pais" autocomplete="off">
                            </div>
                        </div>
                        <div class="campo-container">
                            <div class="campo">
                                <p>Comida favorita</p>
                                <input type="text" name="pregunta1" autocomplete="off">
                            </div>
                            <div class="campo">
                                <p>Artista favorito</p>
                                <input type="text" name="pregunta2" autocomplete="off">
                            </div>
                        </div>
                        <div class="campo-container">
                            <div class="campo">
                                <p>Lugar favorito</p>
                                <input type="text" name="pregunta3" autocomplete="off">
                            </div>
                            <div class="campo">
                                <p>Color favorito</p>
                                <input type="text" name="pregunta4" autocomplete="off">
                            </div>
                        </div>
                        <div class="campo-container">
                            <div class="campo">
                                <p>Contraseña*</p>
                                <input type="password" name="contraseña" id="contraseña" autocomplete="off">
                            </div>
                            <div class="campo">
                                <p>Confirmar contraseña*</p>
                                <input type="password" id="confirmarContraseña">
                            </div>
                        </div>
                        <div id="campo-container">
                            <div id="campo">
                                <label for="archivo" id="custom-file-upload">
                                    <input type="file" name="foto_perfil" accept=".jpg, .pdf" id="archivo" style="display: none;">
                                </label>
                            </div>
                            <div id="texto-container">
                                <div id="texto-arriba">
                                    <p>Foto de perfil</p>
                                    <img id="subirimg" src="../assets/img/subir.png" alt="">
                                </div>
                                <p id="texto-abajo">jpg o PDF de máximo 10 MB</p>
                            </div>
                        </div>

                        <div class="campo-container">
                            <div class="campo">
                                <div class="g-recaptcha" data-sitekey="6LeN_oAnAAAAAOsCbfc4TidanH1BA_sUFo6g-dtH" data-callback="onCaptchaLoad"></div>
                            </div>
                        </div>

                        <form>
                            <!-- Aquí pueden estar los campos del formulario -->
                            <input type="submit" class="btn" name="send" value="Unirme a Weplot" disabled>
                        </form>

                        <div class="campo-container3">
                            <p>¿Ya tienes cuenta?<button onclick="inic()">Inicia sesión aquí</button></p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
// Se importa el archivo de conexión con la base de datos
include('conexion.php');

// Se realiza la validación de datos enviados a la base de datos y se registran
if (isset($_POST['send'])) {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($conn, $_POST['apellido']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
    $pais = mysqli_real_escape_string($conn, $_POST['pais']);
    $pregunta1 = mysqli_real_escape_string($conn, $_POST['pregunta1']);
    $pregunta2 = mysqli_real_escape_string($conn, $_POST['pregunta2']);
    $pregunta3 = mysqli_real_escape_string($conn, $_POST['pregunta3']);
    $pregunta4 = mysqli_real_escape_string($conn, $_POST['pregunta4']);
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Se encripta la contraseña

    // Subida de la foto de perfil
    $foto_perfil = $_FILES['foto_perfil']['name'];
    $foto_perfil_tmp = $_FILES['foto_perfil']['tmp_name'];
    $ruta_foto_perfil = 'ruta/del/directorio/' . $foto_perfil; // Establece la ruta de almacenamiento

    // Mover la foto de perfil subida a su ubicación definitiva
    move_uploaded_file($foto_perfil_tmp, $ruta_foto_perfil);

    // Verificar si el usuario ya existe
    $usuario_query = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
    $usuario_result = mysqli_query($conn, $usuario_query);

    if (mysqli_num_rows($usuario_result) > 0) {
        echo "<script>alert('El usuario ya está registrado. Intente con otro correo.');</script>";
    } else {
        $query = "INSERT INTO usuarios (nombre, apellido, email, telefono, pais, pregunta1, pregunta2, pregunta3, pregunta4, contraseña, foto_perfil)
                  VALUES ('$nombre', '$apellido', '$email', '$telefono', '$pais', '$pregunta1', '$pregunta2', '$pregunta3', '$pregunta4', '$contraseña', '$ruta_foto_perfil')";

        if (mysqli_query($conn, $query)) {
            // Envío de correo electrónico al usuario
            $to = $email;
            $subject = "Registro Exitoso";
            $message = "¡Hola $nombre! Te has registrado exitosamente en nuestro sitio. Gracias por unirte.";
            $headers = "From: bykdvwhl1@gmail.com" . "\r\n" .
                "Reply-To: $email" . "\r\n" .
                "X-Mailer: PHP/" . phpversion();

            mail($to, $subject, $message, $headers);

            header('Location: registro.php');
            echo "<script>alert('¡El usuario se registró correctamente!');</script>";
        } else {
            echo "<script>alert('Hubo un error, inténtalo de nuevo más tarde.');</script>";
        }
    }
}
?>