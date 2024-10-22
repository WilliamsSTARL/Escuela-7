<?php
include("conexion.php");

if(isset($_GET['id_alumno'])) {
    $id = $_GET['id_lumno'];
    $sql = "DELETE FROM lista_alumnos WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: //redirigir a list de alumnos");
    } else {
        header("Location: lista_de_alumnos.php?error=" . $conn->error);
    }
    $conn->close();
} else {
    header("Location: lista_de_alumnos.php?error=ID de alumno no especificado");
}

?>                                   