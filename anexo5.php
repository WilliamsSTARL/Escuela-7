<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eesn7";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$NombreHijo = $_POST['NombreHijo'];
$DNI_Hijo = $_POST['DNI_Hijo'];
$Aclaracion = $_POST['Aclaracion'];
$DNI_Tutor = $_POST['DNI_Tutor'];
$Lugar = $_POST['Lugar'];
$Fecha = $_POST['Fecha'];

if (isset($_FILES['FirmaTutor']) && $_FILES['FirmaTutor']['error'] == 0) {
    $target_dir = "uploads/";

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES['FirmaTutor']['name']);

    if (move_uploaded_file($_FILES['FirmaTutor']['tmp_name'], $target_file)) {
        echo "El archivo " . htmlspecialchars(basename($_FILES['FirmaTutor']['name'])) . " ha sido subido.";
    } else {
        die("Error al subir el archivo.");
    }
} else {
    die("No se ha subido ninguna imagen o hubo un error en la subida.");
}

$FirmaTutor = basename($_FILES['FirmaTutor']['name']);

$sql = "INSERT INTO autorizacion_imagen (NombreHijo, DNI_Hijo, FirmaTutor, Aclaracion, DNI_Tutor, Lugar, Fecha) 
        VALUES ('$NombreHijo', '$DNI_Hijo', '$FirmaTutor', '$Aclaracion', '$DNI_Tutor', '$Lugar', '$Fecha')";
if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado exitosamente";
    $sql_check = "SELECT id FROM estado_anexo WHERE fk_alumno = (SELECT id_alumno FROM lista_alumnos WHERE dni = '$DNI_Hijo')";
    $result_check = $conn->query($sql_check);
    if ($result_check->num_rows > 0) {
        $sql_estado_anexo = "UPDATE estado_anexo SET anexo_4 = 'si' WHERE fk_alumno = (SELECT id_alumno FROM lista_alumnos WHERE dni = '$DNI_Hijo')";
    } else {
        $sql_estado_anexo = "INSERT INTO estado_anexo (fk_alumno, anexo_4) VALUES ((SELECT id_alumno FROM lista_alumnos WHERE dni = '$DNI_Hijo'), 'si')";
    }
    if ($conn->query($sql_estado_anexo)) {
        echo " Estado del anexo 4 actualizado correctamente.";
    } else {
        $error_estado = "Error al actualizar el estado del anexo 4: " . $conn->error;
        logError($error_estado);
        echo $error_estado;
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
