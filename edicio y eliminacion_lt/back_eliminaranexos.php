<?php
include("conexion.php");

if(isset($_GET['id_alumno'])) {
    $id = $_GET['id_lumno'];
    $sql = "DELETE FROM estado_anexos WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: anexos.html");
    } else {
        header("Location: anexos.html?error=" . $conn->error);
    }
    $conn->close();
} else {
    header("Location: anexos.html?error=ID de alumno no especificado");
}

?>