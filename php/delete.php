<?php  
/* Importar conexión */
include ('conexion.php');

/* Verificar si se proporcionó el parámetro 'id' en la URL */
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    /* Construir la consulta SQL para eliminar el registro con la ID proporcionada */
    $query = "DELETE FROM usuarios WHERE id = '$id'";

    /* Ejecutar la consulta SQL */
    if (mysqli_query($conn, $query)) {
        /* Si la eliminación fue exitosa, mostrar una alerta y redirigir a la página de administración */
        echo "<script>alert('Se eliminaron los datos satisfactoriamente');</script>";
        header('Location: admin.php');
    } else {
        /* Si ocurrió un error en la eliminación, mostrar una alerta de error */
        echo "<script>alert('Error en eliminar los datos');</script>";
    }
}
