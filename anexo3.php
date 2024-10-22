<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eesn7";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$ObraSocial = $_POST['ObraSocial'];
$NumeroAfiliado = $_POST['NumeroAfiliado'];
$EnfermedadTratamiento = $_POST['EnfermedadTratamiento'];
$CualEnfermedad = $_POST['CualEnfermedad'];
$Internado = $_POST['Internado'];
$Porque = $_POST['Porque'];
$Alergia = $_POST['Alergia'];
$ManifestacionesAlergia = $_POST['ManifestacionesAlergia'];
$RazonAlergia = $_POST['RazonAlergia'];
$Nosabe = isset($_POST['Nosabe']) ? 1 : 0;
$TratamientoPermanente = $_POST['TratamientoPermanente'];
$RecibeTratamiento = $_POST['RecibeTratamiento'];
$EspecifiqueTratamiento = $_POST['EspecifiqueTratamiento'];
$Quirurgicos = $_POST['Quirurgicos'];
$Edad = $_POST['Edad'];
$TipoCirugia = $_POST['TipoCirugia'];
$LimitacionFisica = $_POST['limitación_física'];
$Aclaracion = $_POST['Aclaracion'];
$ProblemasSalud = $_POST['ProblemasSalud'];
$Vacunacion = $_POST['Vacunacion'];
$Talla = $_POST['Talla'];
$Peso = $_POST['Peso'];
$FechaDeterminacion = $_POST['FD'];
$Institucion = $_POST['Institucion'];
$TelefonoInstitucion = $_POST['TelefonoInstitucion'];
$DomicilioInstitucion = $_POST['DomicilioInstitucion'];
$ApellidoMedico = $_POST['ApellidoMedico'];
$NombreMedico = $_POST['NombreMedico'];
$TelefonoMedico = $_POST['TelefonoMedico'];
$DomicilioMedico = $_POST['DomicilioMedico'];
$ApellidoFamiliar = $_POST['ApellidoFamiliar'];
$NombreFamiliar = $_POST['NombreFamiliar'];
$TelefonoFamiliar = $_POST['TelefonoFamiliar'];
$DomicilioFamiliar = $_POST['DomicilioFamiliar'];
$FechaActualizacion1 = $_POST['FechaActualizacion1'];
$DescripcionSalud1 = $_POST['DescripcionSalud1'];
$Anual1 = $_POST['Anual1'];
$Cambios1 = $_POST['Cambios1'];
$FechaActualizacion2 = $_POST['FechaActualizacion2'];
$DescripcionSalud2 = $_POST['DescripcionSalud2'];
$Anual2 = $_POST['Anual2'];
$Cambios2 = $_POST['Cambios2'];
$FechaActualizacion3 = $_POST['FechaActualizacion3'];
$DescripcionSalud3 = $_POST['DescripcionSalud3'];
$Anual3 = $_POST['Anual3'];
$Cambios3 = $_POST['Cambios3'];
$FechaInscripcion = $_POST['FechaInscripcion'];
$FirmaResponsable = $_POST['FirmaResponsable'];
$AclaracionFinal = $_POST['Aclaracion'];
$NombreHijo = $_POST['NombreHijo'];
$DNI = $_POST['DNI'];
$Domicilio = $_POST['Domicilio'];
$Localidad = $_POST['Localidad'];
$Telefono = $_POST['Telefono'];
$Establecimiento = $_POST['Establecimiento'];
$LocalidadEstablecimiento = $_POST['LocalidadEstablecimiento'];
$FechaClase = $_POST['FechaClase'];
$HorarioClase = $_POST['HorarioClase'];
$HorarioClase2 = $_POST['HorarioClase2'];
$HorarioClase3 = $_POST['HorarioClase3'];
$Instalaciones = $_POST['Instalaciones'];
$CalleInstalaciones = $_POST['CalleInstalaciones'];
$NumeroCalleInstalaciones = $_POST['NumeroCalleInstalaciones'];
$LocalidadInstalaciones = $_POST['LocalidadInstalaciones'];
$TelefonoInstalaciones = $_POST['TelefonoInstalaciones'];
$Lugar = $_POST['Lugar'];
$FechaAutorizacion = $_POST['FechaAutorizacion'];
$FirmaTutor = $_POST['FirmaTutor'];
$DNI_Tutor = $_POST['DNI_Tutor'];



$sql = "INSERT INTO ficha_autorizacion_educacion_fisica (
    ObraSocial, NumeroAfiliado, EnfermedadTratamiento, CualEnfermedad, Internado, Porque, Alergia, ManifestacionesAlergia,
    RazonAlergia, Nosabe, TratamientoPermanente, RecibeTratamiento, EspecifiqueTratamiento, Quirurgicos, Edad, TipoCirugia,
    LimitacionFisica, Aclaracion, ProblemasSalud, Vacunacion, Talla, Peso, FechaDeterminacion, Institucion, TelefonoInstitucion,
    DomicilioInstitucion, ApellidoMedico, NombreMedico, TelefonoMedico, DomicilioMedico, ApellidoFamiliar, NombreFamiliar,
    TelefonoFamiliar, DomicilioFamiliar, FechaActualizacion1, DescripcionSalud1, Anual1, Cambios1, FechaActualizacion2,
    DescripcionSalud2, Anual2, Cambios2, FechaActualizacion3, DescripcionSalud3, Anual3, Cambios3, FechaInscripcion,
    FirmaResponsable, AclaracionFinal, NombreHijo, DNI, Domicilio, Localidad, Telefono, Establecimiento, LocalidadEstablecimiento,
    FechaClase, HorarioClase, HorarioClase2, HorarioClase3, Instalaciones, CalleInstalaciones, NumeroCalleInstalaciones,
    LocalidadInstalaciones, TelefonoInstalaciones, Lugar, FechaAutorizacion, FirmaTutor, DNI_Tutor
) VALUES (
    '$ObraSocial', '$NumeroAfiliado', '$EnfermedadTratamiento', '$CualEnfermedad', '$Internado', '$Porque', '$Alergia',
    '$ManifestacionesAlergia', '$RazonAlergia', $Nosabe, '$TratamientoPermanente', '$RecibeTratamiento', '$EspecifiqueTratamiento',
    '$Quirurgicos', '$Edad', '$TipoCirugia', '$LimitacionFisica', '$Aclaracion', '$ProblemasSalud', '$Vacunacion', '$Talla',
    '$Peso', '$FechaDeterminacion', '$Institucion', '$TelefonoInstitucion', '$DomicilioInstitucion', '$ApellidoMedico', '$NombreMedico',
    '$TelefonoMedico', '$DomicilioMedico', '$ApellidoFamiliar', '$NombreFamiliar', '$TelefonoFamiliar', '$DomicilioFamiliar',
    '$FechaActualizacion1', '$DescripcionSalud1', '$Anual1', '$Cambios1', '$FechaActualizacion2', '$DescripcionSalud2', '$Anual2',
    '$Cambios2', '$FechaActualizacion3', '$DescripcionSalud3', '$Anual3', '$Cambios3', '$FechaInscripcion', '$FirmaResponsable',
    '$AclaracionFinal', '$NombreHijo', '$DNI', '$Domicilio', '$Localidad', '$Telefono', '$Establecimiento', '$LocalidadEstablecimiento',
    '$FechaClase', '$HorarioClase', '$HorarioClase2', '$HorarioClase3', '$Instalaciones', '$CalleInstalaciones', '$NumeroCalleInstalaciones',
    '$LocalidadInstalaciones', '$TelefonoInstalaciones', '$Lugar', '$FechaAutorizacion', '$FirmaTutor', '$DNI_Tutor'
)";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado exitosamente";
    $sql_estado_anexo3 = "UPDATE estado_anexo SET anexo_3 = 'si' WHERE fk_alumno = (SELECT id_alumno FROM lista_alumnos WHERE dni = '$DNI')";
    $result = $conn->query($sql_estado_anexo3);
    if ($result) {
        if ($conn->affected_rows === 0) {
            $sql_insert_anexo3 = "INSERT INTO estado_anexo (fk_alumno, anexo_3) VALUES ((SELECT id_alumno FROM lista_alumnos WHERE dni = '$DNI'), 'si')";
            if ($conn->query($sql_insert_anexo3)) {
                echo " Estado del anexo 3 insertado correctamente.";
            } else {
                $error_insert = "Error al insertar el estado del anexo 3: " . $conn->error;
                logError($error_insert);
                echo $error_insert;
            }
        } else {
            echo " Estado del anexo 3 actualizado correctamente.";
        }
    } else {
        $error_estado = "Error al actualizar el estado del anexo 3: " . $conn->error;
        logError($error_estado);
        echo $error_estado;
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>