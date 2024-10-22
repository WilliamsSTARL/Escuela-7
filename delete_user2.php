<?php
session_start();

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $conexion = mysqli_connect("localhost", "root", "", "eesn7");

    $id = mysqli_real_escape_string($conexion, $id);

    $sql = "DELETE FROM lista_alumnos WHERE id_alumno='$id'";

    if (mysqli_query($conexion, $sql)) {
        echo "success";
    } else {
        echo "error: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
} else {
    echo "no_id";
}
?>
