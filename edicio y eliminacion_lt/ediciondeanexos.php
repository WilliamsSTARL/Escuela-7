<?php
include 'conexion.php';

$id = $_GET['id'];

$sql = "SELECT * FROM estado_anexos WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
