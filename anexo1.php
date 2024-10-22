<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eesn7";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$apellido = isset($_POST['Apellido']) ? $_POST['Apellido'] : '';
$nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : '';
$dni = isset($_POST['DNI']) ? $_POST['DNI'] : '';
$domicilio = isset($_POST['Domicilio']) ? $_POST['Domicilio'] : '';
$localidad = isset($_POST['Localidad']) ? $_POST['Localidad'] : '';
$telefono = isset($_POST['Telefono']) ? $_POST['Telefono'] : '';
$email = isset($_POST['Email']) ? $_POST['Email'] : '';
$lugar_fecha_nacimiento = isset($_POST['LYF']) ? $_POST['LYF'] : '';
$tutor = isset($_POST['Tutor']) ? $_POST['Tutor'] : '';
$curso = isset($_POST['Curso']) ? $_POST['Curso'] : '';
$division = isset($_POST['Division']) ? $_POST['Division'] : '';
$observaciones = isset($_POST['Observaciones']) ? $_POST['Observaciones'] : '';
$ficha_inscripcion = isset($_POST['F/INSCRIPCION']) ? $_POST['F/INSCRIPCION'] : '';
$dni_alumno = isset($_POST['DNIalumno']) ? $_POST['DNIalumno'] : '';
$cuil_alumno = isset($_POST['CUILdelAlumno']) ? $_POST['CUILdelAlumno'] : '';
$certificado_nacimiento = isset($_POST['Certificadodenacimiento']) ? $_POST['Certificadodenacimiento'] : '';
$ficha_salud = isset($_POST['Fichadesalud']) ? $_POST['Fichadesalud'] : '';
$vacunas = isset($_POST['Vacunas']) ? $_POST['Vacunas'] : '';
$certificado_salud = isset($_POST['Certificadodesalud']) ? $_POST['Certificadodesalud'] : '';
$certificado_oftalmologico = isset($_POST['CertificadoOftalmologico']) ? $_POST['CertificadoOftalmologico'] : '';
$dni_tutor = isset($_POST['DNItutor']) ? $_POST['DNItutor'] : '';
$certificado_aprobacion = isset($_POST['Certificadodeaprobación']) ? $_POST['Certificadodeaprobación'] : '';
$otros = isset($_POST['Otros']) ? $_POST['Otros'] : '';
$fecha = isset($_POST['Fecha']) ? $_POST['Fecha'] : '';
$lugar = isset($_POST['Lugar']) ? $_POST['Lugar'] : '';

$Odontologico = isset($_POST['Odontologico']) ? $_POST['Odontologico'] : '';
$PASE = isset($_POST['PASE']) ? $_POST['PASE'] : '';
$AImagen = isset($_POST['AImagen']) ? $_POST['AImagen'] : '';

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["Foto"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Verifica si el archivo es una imagen
if (isset($_FILES["Foto"]) && $_FILES["Foto"]["tmp_name"] != "") {
    $check = getimagesize($_FILES["Foto"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["Foto"]["tmp_name"], $target_file)) {
            $foto = $target_file;
        } else {
            echo "Error al subir el archivo.";
            exit;
        }
    } else {
        echo "El archivo no es una imagen.";
        exit;
    }
} else {
    $foto = '';
}

// Inserta los datos en la base de datos
$sql = "INSERT INTO legajo_alumno (apellido, nombre, dni, domicilio, localidad, foto, telefono, email, tutor, curso, observaciones, ficha_inscripcion, dni_alumno, cuil_alumno, certificado_nacimiento, ficha_salud, vacunas, certificado_salud, certificado_oftalmologico, dni_tutor, certificado_aprobacion, otros, Fecha_nacimiento, Lugar, Division, `Odontologico`, `PASE`, `AImagen`)
VALUES ('$apellido', '$nombre', '$dni', '$domicilio', '$localidad', '$foto', '$telefono', '$email', '$tutor', '$curso', '$observaciones', '$ficha_inscripcion', '$dni_alumno', '$cuil_alumno', '$certificado_nacimiento', '$ficha_salud', '$vacunas', '$certificado_salud', '$certificado_oftalmologico', '$dni_tutor', '$certificado_aprobacion', '$otros', '$fecha', '$lugar', '$division', '$Odontologico', '$PASE', '$AImagen')";
// Consulta para obtener el ID del alumno basado en el DNI proporcionado
$sql = "SELECT id_alumno FROM lista_alumnos WHERE dni = '$dni'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_alumno = $row['id'];

    $sql_check = "SELECT * FROM estado_anexo WHERE fk_alumno = '$id_alumno'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {

        $sql = "UPDATE estado_anexo SET anexo_1 = 'si' WHERE fk_alumno = '$id_alumno'";
    } else {
        $sql = "INSERT INTO estado_anexo (fk_alumno, anexo_1, anexo_2, anexo_3, anexo_4, anexo_5) VALUES ('$id_alumno', 'si', 'no', 'no', 'no', 'no')";
    }
} else {
    echo "No se encontró el alumno con el DNI proporcionado.";
    exit;
}
if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
