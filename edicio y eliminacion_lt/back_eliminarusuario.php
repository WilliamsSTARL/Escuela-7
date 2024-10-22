<?php
include("conexion.php");

if(isset($_GET['usuario_id'])) {
    $id = $_GET['usuario_id'];
    $sql = "DELETE FROM usuarios WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: //redirigir a list de usuarios");
    } else {
        header("Location: lista_de_usuarios.php?error=" . $conn->error);
    }
    $conn->close();
} else {
    header("Location: lista_de_usuarios.php?error=ID de usuario no especificado");
}

?>