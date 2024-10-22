<?php
$conn = new mysqli('localhost', 'root', '', 'eesn7');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_alumno = $_POST['id_alumno'];
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $domicilio = $_POST['domicilio'];
    $localidad = $_POST['localidad'];
    $telefono = $_POST['telefono'];
    $tutor = $_POST['tutor'];
    $curso = $_POST['curso'];
    $division = $_POST['division'];
    $turno = $_POST['turno'];

    $sql = "UPDATE lista_alumnos SET 
                dni='$dni', 
                nombre='$nombre', 
                apellido='$apellido', 
                domicilio='$domicilio', 
                localidad='$localidad', 
                telefono='$telefono', 
                tutor_a_cargo='$tutor', 
                curso='$curso', 
                division='$division', 
                turno='$turno' 
            WHERE id_alumno='$id_alumno'";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
