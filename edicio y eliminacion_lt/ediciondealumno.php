<?php
include 'conexion.php';

$id = $_GET['id_alumno'];

$sql = "SELECT * FROM lista_alumnos WHERE id = $id_alumno";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>