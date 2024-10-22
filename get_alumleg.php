<?php
require 'conexion.php';

if (isset($_GET['dni'])) {
    $dni = $_GET['dni'];
    $consulta = "SELECT id, apellido, nombre, dni, domicilio, localidad, foto, telefono, email, tutor, curso, observaciones, ficha_inscripcion, dni_alumno, cuil_alumno, certificado_nacimiento, ficha_salud, vacunas, certificado_salud, certificado_oftalmologico, dni_tutor, certificado_aprobacion, otros, Fecha_nacimiento, Lugar, Division FROM legajo_alumno WHERE dni = ?";
    
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("s", $dni);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows > 0) {
        $datos = $resultado->fetch_assoc();
        echo json_encode($datos);
    } else {
        echo json_encode(array('error' => 'No se encontraron datos'));
    }
    
    $stmt->close();
}
$conexion->close();
?>
