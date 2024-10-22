<?php
$host = "localhost";
$user = "root";
$password = "";
$basename = "eesn7"; 

$conexion = mysqli_connect($host , $user , $password ,$basename);

if(!$conexion){
die("Error de Conexion: " . mysqli_connect_error($conexion));
}
if(!mysqli_set_charset($conexion, "utf8")){
    die("Error al establecer el juego de caracteres: " . mysqli_error($conexion));
}
?>