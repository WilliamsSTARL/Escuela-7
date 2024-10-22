<?php
session_start();
$DNI = $_POST["Dni"];
$Nombre = $_POST["Nombre"];
$Contraseña = $_POST["Contraseña"];
$Cargo = $_POST["Cargo"];

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "eesn7");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Verificar si el DNI ya existe
$verificarDNI = $conexion->prepare("SELECT COUNT(*) FROM usu WHERE DNI = ?");
$verificarDNI->bind_param("s", $DNI);
$verificarDNI->execute();
$verificarDNI->bind_result($dniExiste);
$verificarDNI->fetch();
$verificarDNI->close();

if ($dniExiste > 0) {
    echo json_encode(array("status" => "error", "message" => "El DNI ya existe."));
    exit();
}

$ContraseñaEncriptada = password_hash($Contraseña, PASSWORD_DEFAULT);

$m = $conexion->prepare("INSERT INTO usu (DNI, CONTRASEÑA, JERARQUIA, NOMBRE) VALUES (?, ?, ?, ?)");
$m->bind_param("ssss", $DNI, $ContraseñaEncriptada, $Cargo, $Nombre);
$m->execute();
$m->close();

echo json_encode(array("status" => "success", "message" => "Usuario insertado correctamente."));
$conexion->close();
exit();
?>
