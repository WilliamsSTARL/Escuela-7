<?php
session_start();

$DNI = $_POST["DNI"];
$Nombre = $_POST["Nombre"];
$Apellido = $_POST["Apellido"];
$Domicilio = $_POST["Domicilio"];
$Localidad = $_POST["Localidad"];
$Telefono = $_POST["Telefono"];
$Tutor = $_POST["Tutor"];
$Curso = $_POST["Curso"];
$Division = $_POST["Division"];
$Turno = $_POST["Turno"];

$conexion = mysqli_connect("localhost","root","","eesn7");

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$sql = "INSERT INTO lista_alumnos (dni, nombre, apellido, domicilio, localidad, telefono, tutor_a_cargo, curso, division, turno)
        VALUES ('$DNI', '$Nombre', '$Apellido', '$Domicilio', '$Localidad', '$Telefono', '$Tutor', '$Curso', '$Division', '$Turno')";

if (mysqli_query($conexion, $sql)) {
    echo "success";
} else {
    echo "error";
}

mysqli_close($conexion);
exit();
?>
