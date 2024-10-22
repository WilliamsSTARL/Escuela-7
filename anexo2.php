<?php
$host = 'localhost';
$dbname = 'eesn7';
$username = 'root';
$password = '';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$logFile = 'error_log.txt';
ini_set('log_errors', 1);
ini_set('error_log', $logFile);

function logError($message) {
    global $logFile;
    error_log($message . "\n", 3, $logFile);
}

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    $error = "Conexión fallida: " . mysqli_connect_error();
    logError($error);
    die($error);
}

try {
$apellido_alumno = $_POST['apellido_alumno'] ?? 'No especificado';
$nombre_alumno = $_POST['nombre_alumno'] ?? 'No especificado';
$fecha_nacimiento = isset($_POST['fecha_nacimiento_alumno']) ? date('Y-m-d', strtotime($_POST['fecha_nacimiento_alumno'])) : '0000-00-00';
$tiene_dni_argentino = $_POST['dni_argentino'];
$nro_dni_argentino = $_POST['nro_dni_argentino'];
$cuil_alumno = $_POST['cuil_alumno'];
$posee_cpi = $_POST['certificado_preidentificacion'];
$identidad_genero = $_POST['identidad_genero'];
$nro_documento_extranjero = $_POST['nro_documento_extranjero'] ?? 'No especificado';
$tipo_documento_extranjero = $_POST['tipo_documento_extranjero'] ?? 'No especificado';

$calle = $_POST['domicilio_calle'];
$nro_calle = $_POST['domicilio_numero'];
$piso_torre = $_POST['domicilio_piso_torre_depto'];
$entre_calles = $_POST['domicilio_entre_calles'];
$otro_dato = $_POST['domicilio_otro_dato'];
$provincia_actual = $_POST['provincia'];
$distrito = $_POST['distrito'];
$localidad = $_POST['localidad'];
$telefono = $_POST['telefono_area'];
$telefono_celular = $_POST['telefono_celular'];

$lugar_nacimiento = $_POST['lugar_nacimiento'];
$nacionalidad = $_POST['nacionalidad'];
$provincia_nacimiento = $_POST['provincia_argentina'];
$tiene_hermanos = $_POST['hermanos'];
$cantidad_hermanos = $_POST['cantidad_hermanos'];
$habla_lengua_indigena = $_POST['lengua_indigena'];
$habla_otras_lenguas = $_POST['otras_lenguas'];
$descendiente_originario = $_POST['pueblos_originarios'];
$percibe_auh = $_POST['asignacion_universal'];
$percibe_progresar = $_POST['progresar'];
$trasporte_pie_bicicleta = $_POST['medio_transporte'] ?? 'NO';
$trasporte_escolar = $_POST['trasporte_escolar'] ?? 'NO';
$trasporte_colectivo = $_POST['trasporte_colectivo'] ?? 'NO';
$trasporte_tren = $_POST['trasporte_tren'] ?? 'NO';
$trasporte_particular = $_POST['trasporte_particular'] ?? 'NO';
$trasporte_taxi = $_POST['trasporte_taxi'] ?? 'NO';
$transporte_otro = $_POST['transporte_otro'] ?? 'NO';
$hijos_menores = $_POST['hijas_hijos_menores_3'];
$asisten_maternal = $_POST['sala_maternales'];
$localidad_BA = $_POST['localidad_BA'] ?? 'No especificado';
$distrito_BA = $_POST['distrito_BA'] ?? 'No especificado';

$tiene_obra_social = $_POST['obra_social'];
$nombre_obra_social = $_POST['obra_social_nombre'];
$nro_afiliado = $_POST['obra_social_numero'];
$antecedente_asma = $_POST['Asma'];
$antecedente_celiaquia = $_POST['Celiaquia'];
$antecedente_cardiaco = $_POST['ProblemasCardiacos'];
$antecedente_diabetes = $_POST['Diabetes'];
$antecedente_presion_alta = $_POST['PresionAlta'];
$antecedente_convulsiones = $_POST['Convulsiones'];
$antecedente_alteracion_sanguinea = $_POST['AlteracionesSanguineas'];
$antecedente_quemaduras_graves = $_POST['Quemaduras'];
$antecedente_organos = $_POST['FaltaOrgano'];
$antecedente_oncologico = $_POST['EnfermedadOncohematologica'];
$antecedente_inmunodeficiencia = $_POST['Inmunodeficiencias'];
$antecedente_fracturas = $_POST['Fracturas'];
$antecedente_huesos = $_POST['ProblemasHuesos'];
$antecedente_traumatismos = $_POST['TraumatismoCráneo'];
$antecedente_problemas_piel = $_POST['ProblemasPiel'];

$ejercicio_desmayo = $_POST['Desmayos'];
$ejercicio_dolor_pecho = $_POST['DolorPecho'];
$ejercicio_mareos = $_POST['Mareos'];
$ejercicio_mayor_cansancio = $_POST['MayorCansancio'];
$ejercicio_palpitaciones = $_POST['Palpitaciones'];
$ejercicio_dificultad_respirar = $_POST['DificultadRespirar'];

$internacion_comun = $_POST['Internacion/SC'];
$internacion_intensiva = $_POST['Internacion/CII'];
$cant_veces_internado = $_POST['VECES'];
$causa_internacion = $_POST['CAUSA'];

$antecedente_alergia_grave = $_POST['AlergiaGrave'];
$alergia_medicamento = $_POST['AlergiaMedicamentos'];
$internacion_medicamento = $_POST['AlergiaInternacion/M'];
$alergia_vacuna = $_POST['AlergiaVacunas'];
$internacion_vacuna = $_POST['AlergiaInternacion/V'];
$alergia_alimento = $_POST['AlergiaAlimentos'];
$internacion_alimento = $_POST['AlergiaInternacion/A'];
$alergia_insectos = $_POST['AlergiaPicaduras'];
$internacion_insecto = $_POST['AlergiaInternacion/P'];
$alergia_estacional = $_POST['AlergiaEstacionales'];
$internacion_estacional = $_POST['AlergiaInternacion/E'];
$alergia_otras = $_POST['AlergiaOtras'];
$internacion_otras = $_POST['AlergiaInternacion/O'];
$disminucion_auditiva = $_POST['DisminucionAuditiva'];
$usa_audifonos = $_POST['UsoAudifonos'];
$disminucion_visual = $_POST['DisminucionVisual'];
$usa_lentes = $_POST['UsoLentes'];

$recibe_medicacion = $_POST['MedicaciónHabitual'];
$tipo_medicacion = $_POST['CualMedicación'];
$recibio_operacion = $_POST['Operacion'];
$motivo_operacion = $_POST['MotivoOperacion'];
$fecha_operacion = isset($_POST['AnoOperacion']) ? date('Y-m-d', strtotime($_POST['AnoOperacion'])) : '0000-00-00';
$antecedente_fam_muerte_subita = $_POST['MuerteSubita'];
$antecedente_fam_diabetes = $_POST['DiabetesFamiliar'];
$antecedente_fam_cardiacos = $_POST['ProblemasCardiacosFamiliar'];
$antecedente_fam_tos_cronica = $_POST['TosCronica'];
$antecedente_fam_celiaco = $_POST['CeliaquiaFamiliar'];

$establecimiento_actual_distrito = $_POST['datos_establecimiento_distrito'];
$establecimiento_actual_nombre = $_POST['datos_establecimiento_nombre'];
$establecimiento_actual_nro = $_POST['datos_establecimiento_numero'];
$establecimiento_actual_gestion = $_POST['datos_establecimiento_gestion'];

$establecimiento_procedencia_pais = $_POST['Pais'];
$establecimiento_procedencia_provincia = $_POST['Provincia'];
$establecimiento_procedencia_distrito = $_POST['DistritoB'];
$establecimiento_procedencia_modalidad = $_POST['NivelModalidad'];
$establecimiento_procedencia_gestion = $_POST['GESTIONDOS'];
$establecimiento_procedencia_dependencia = $_POST['Dependencia'];
$establecimiento_procedencia_nombre = $_POST['NombreEscuelaProcedencia'];
$establecimiento_procedencia_nro = $_POST['N2'];

$inscripcion_modalidad = $_POST['inscripcion_ciclo'];
$inscripcion_orientacion = $_POST['Orientacion'];
$inscripcion_turno = $_POST['turno_solicitado'];
$inscripcion_jornada = $_POST['jornada'];
$inscripcion_año = $_POST['ano'];
$inscripcion_condicion = $_POST['condicion_inscripcion'];

$inscripcion_inclusion = $_POST['proyecto_inclusion'];
$tipo_inclusion = $_POST['acompanamiento_inclusion'];
$inscripcion_asistente_externo = $_POST['acompanante_externo'];

$complementario_centro_educativo = $_POST['cec'];
$complementario_educacion_fisica = $_POST['cef'];
$complementario_educacion_estetica = $_POST['escuela_estetica'];

$servicio_alimentario = $_POST['servicio_alimentario'];

if (isset($_FILES['url_firma_responsable']) && $_FILES['url_firma_responsable']['error'] == 0) {
    $archivo_temporal = $_FILES['url_firma_responsable']['tmp_name'];
    $nombre_archivo = basename($_FILES['url_firma_responsable']['name']);
    $directorio_destino = "img_firmas/" . $nombre_archivo;

    // Mueve el archivo a la carpeta de destino
    if (move_uploaded_file($archivo_temporal, $directorio_destino)) {
        $url_firma_responsable = $directorio_destino;
    } else {
        echo "Error al subir el archivo.";
        $url_firma_responsable = 'No especificado'; // Asigna valor predeterminado en caso de error
    }
} else {
    echo "No se ha subido ninguna firma.";
    $url_firma_responsable = 'No especificado'; // Asigna valor predeterminado si no se subió archivo
}
$aclaracion_firma = $_POST['aclaracion_firma'];
$fecha_inscripcion = isset($_POST['fecha_inscripcion']) ? date('Y-m-d', strtotime($_POST['fecha_inscripcion'])) : '0000-00-00';


$responsable1_vinculo = $_POST['responsable_1_vinculo'];
$responsable1_apellido = $_POST['responsable_1_apellido'];
$responsable1_nombre = $_POST['responsable_1_nombre'];
$responsable1_nacionalidad = $_POST['responsable_1_nacionalidad'];
$responsable1_dni_argentino = $_POST['responsable_1_dni_argentino'];
$responsable1_nro_dni_argentino = $_POST['responsable_1_numero_dni_argentino'];
$responsable1_posee_CPI = $_POST['responsable_1_certificado_preidentificacion'] ?? 'NO';
$responsable1_tipo_documento = $_POST['responsable_1_documento_extranjero'];
$responsable1_nro_documento = $_POST['NUMEXTRAN'];
$responsable1_profesion = $_POST['responsable_1_profesion'];
$responsable1_estudio = $_POST['responsable_1_educacion'];
$responsable1_nivel_maximo_estudio = $_POST['responsable_1_nivel_mas_alto'];
$responsable1_finalizo_nivel = $_POST['responsable_1_completo'] ?? 'NO';
$responsable1_actividad_estudia = $_POST['responsable_1_actividad_estudia'] ?? 'NO';
$responsable1_actividad_trabaja = $_POST['responsable_1_actividad_trabaja'] ?? 'NO';
$responsable1_actividad_busca_trabajo = $_POST['responsable_1_actividad_busca_trabajo'] ?? 'NO';
$responsable1_actividad_cuidado_no_pago = $_POST['responsable_1_actividad_cuidado_no_pago'] ?? 'NO';
$responsable1_actividad_recibe_jubilacion = $_POST['responsable_1_actividad_recibe_jubilacion'] ?? 'NO';
$responsable1_convive_con_estudiante = $_POST['responsable_1_convive'] ?? 'NO';
$responsable1_domicilio_calle = $_POST['responsable_1_domicilio_calle'];
$responsable1_domicilio_nro = $_POST['responsable_1_domicilio_numero'];
$responsable1_domicilio_piso = $_POST['responsable_1_domicilio_piso_torre_depto'];
$responsable1_domicilio_entre_calles = $_POST['responsable_1_domicilio_entre_calles'];
$responsable1_domicilio_otro_dato = $_POST['responsable_1_domicilio_otro_dato'];
$responsable1_domicilio_provincia = $_POST['responsable_1_provincia'];
$responsable1_domicilio_distrito = $_POST['responsable_1_distrito'];
$responsable1_domicilio_localidad = $_POST['responsable_1_localidad'];
$responsable1_domicilio_telefono = $_POST['responsable_1_telefono_area'];
$responsable1_telefono_celular = $_POST['responsable_1_telefono_celular'];
$responsable1_email = $_POST['responsable_1_correo_electronico'];


$sql_responsable1 = "INSERT INTO responsable_1_alumno (
    responsable1_vinculo,
    responsable1_apellido,
    responsable1_nombre,
    responsable1_nacionalidad,
    responsable1_dni_argentino,
    responsable1_nro_dni_argentino,
    responsable1_posee_CPI,
    responsable1_tipo_documento,
    responsable1_nro_documento,
    responsable1_profesion,
    responsable1_estudio,
    responsable1_nivel_maximo_estudio,
    responsable1_finalizo_nivel,
    responsable1_actividad_estudia,
    responsable1_actividad_trabaja,
    responsable1_actividad_busca_trabajo,
    responsable1_actividad_cuidado_no_pago,
    responsable1_actividad_recibe_jubilacion,
    responsable1_convive_con_estudiante,
    responsable1_domicilio_calle,
    responsable1_domicilio_nro,
    responsable1_domicilio_piso,
    responsable1_domicilio_entre_calles,
    responsable1_domicilio_otro_dato,
    responsable1_domicilio_provincia,
    responsable1_domicilio_distrito,
    responsable1_domicilio_localidad,
    responsable1_domicilio_telefono,
    responsable1_telefono_celular,
    responsable1_email
) VALUES (
    '$responsable1_vinculo',
    '$responsable1_apellido',
    '$responsable1_nombre',
    '$responsable1_nacionalidad',
    '$responsable1_dni_argentino',
    '$responsable1_nro_dni_argentino',
    '$responsable1_posee_CPI',
    '$responsable1_tipo_documento',
    '$responsable1_nro_documento',
    '$responsable1_profesion',
    '$responsable1_estudio',
    '$responsable1_nivel_maximo_estudio',
    '$responsable1_finalizo_nivel',
    '$responsable1_actividad_estudia',
    '$responsable1_actividad_trabaja',
    '$responsable1_actividad_busca_trabajo',
    '$responsable1_actividad_cuidado_no_pago',
    '$responsable1_actividad_recibe_jubilacion',
    '$responsable1_convive_con_estudiante',
    '$responsable1_domicilio_calle',
    '$responsable1_domicilio_nro',
    '$responsable1_domicilio_piso',
    '$responsable1_domicilio_entre_calles',
    '$responsable1_domicilio_otro_dato',
    '$responsable1_domicilio_provincia',
    '$responsable1_domicilio_distrito',
    '$responsable1_domicilio_localidad',
    '$responsable1_domicilio_telefono',
    '$responsable1_telefono_celular',
    '$responsable1_email'
);";

if (mysqli_query($conn, $sql_responsable1)) {
    echo "Datos del responsable 1 insertados correctamente.";
} else {
    $error = "Error al insertar los datos del responsable 1: " . mysqli_error($conn);
    logError($error);
    echo $error;
}


$responsable2_vinculo = $_POST['responsable_2_vinculo'];
$responsable2_apellido = $_POST['responsable_2_apellido'];
$responsable2_nombre = $_POST['responsable_2_nombre'];
$responsable2_nacionalidad = $_POST['responsable_2_nacionalidad'];
$responsable2_dni_argentino = $_POST['responsable_2_dni_argentino'];
$responsable2_nro_dni_argentino = $_POST['responsable_2_numero_dni_argentino'];
$responsable2_posee_CPI = $_POST['responsable_2_certificado_preidentificacion'] ?? 'NO';
$responsable2_tipo_documento = $_POST['responsable_2_documento_extranjero'];
$responsable2_nro_documento = $_POST['NUMEXTRAN'];
$responsable2_profesion = $_POST['responsable_2_profesion'];
$responsable2_estudio = $_POST['responsable_2_educacion'];
$responsable2_nivel_maximo_estudio = $_POST['responsable_2_nivel_mas_alto'];
$responsable2_finalizo_nivel = $_POST['responsable_2_completo'] ?? 'NO';
$responsable2_actividad_estudia = $_POST['responsable_2_actividad_estudia'] ?? 'NO';
$responsable2_actividad_trabaja = $_POST['responsable_2_actividad_trabaja'] ?? 'NO';
$responsable2_actividad_busca_trabajo = $_POST['responsable_2_actividad_busca_trabajo'] ?? 'NO';
$responsable2_actividad_cuidado_no_pago = $_POST['responsable_2_actividad_cuidado_no_pago'] ?? 'NO';
$responsable2_actividad_recibe_jubilacion = $_POST['responsable_2_actividad_recibe_jubilacion'] ?? 'NO';
$responsable2_convive_con_estudiante = $_POST['responsable_2_convive'] ?? 'NO';
$responsable2_domicilio_calle = $_POST['responsable_2_domicilio_calle'];
$responsable2_domicilio_nro = $_POST['responsable_2_domicilio_numero'];
$responsable2_domicilio_piso = $_POST['responsable_2_domicilio_piso_torre_depto'];
$responsable2_domicilio_entre_calles = $_POST['responsable_2_domicilio_entre_calles'];
$responsable2_domicilio_otro_dato = $_POST['responsable_2_domicilio_otro_dato'];
$responsable2_domicilio_provincia = $_POST['responsable_2_provincia'];
$responsable2_domicilio_distrito = $_POST['responsable_2_distrito'];
$responsable2_domicilio_localidad = $_POST['responsable_2_localidad'];
$responsable2_domicilio_telefono = $_POST['responsable_2_telefono_area'];
$responsable2_telefono_celular = $_POST['responsable_2_telefono_celular'];
$responsable2_email = $_POST['responsable_2_correo_electronico'];

$sql_responsable2 = "INSERT INTO responsable_2_alumno (
    responsable2_vinculo,
    responsable2_apellido,
    responsable2_nombre,
    responsable2_nacionalidad,
    responsable2_dni_argentino,
    responsable2_nro_dni_argentino,
    responsable2_posee_CPI,
    responsable2_tipo_documento,
    responsable2_nro_documento,
    responsable2_profesion,
    responsable2_estudio,
    responsable2_nivel_maximo_estudio,
    responsable2_finalizo_nivel,
    responsable2_actividad_estudia,
    responsable2_actividad_trabaja,
    responsable2_actividad_busca_trabajo,
    responsable2_actividad_cuidado_no_pago,
    responsable2_actividad_recibe_jubilacion,
    responsable2_convive_con_estudiante,
    responsable2_domicilio_calle,
    responsable2_domicilio_nro,
    responsable2_domicilio_piso,
    responsable2_domicilio_entre_calles,
    responsable2_domicilio_otro_dato,
    responsable2_domicilio_provincia,
    responsable2_domicilio_distrito,
    responsable2_domicilio_localidad,
    responsable2_domicilio_telefono,
    responsable2_telefono_celular,
    responsable2_email
) VALUES (
    '$responsable2_vinculo',
    '$responsable2_apellido',
    '$responsable2_nombre',
    '$responsable2_nacionalidad',
    '$responsable2_dni_argentino',
    '$responsable2_nro_dni_argentino',
    '$responsable2_posee_CPI',
    '$responsable2_tipo_documento',
    '$responsable2_nro_documento',
    '$responsable2_profesion',
    '$responsable2_estudio',
    '$responsable2_nivel_maximo_estudio',
    '$responsable2_finalizo_nivel',
    '$responsable2_actividad_estudia',
    '$responsable2_actividad_trabaja',
    '$responsable2_actividad_busca_trabajo',
    '$responsable2_actividad_cuidado_no_pago',
    '$responsable2_actividad_recibe_jubilacion',
    '$responsable2_convive_con_estudiante',
    '$responsable2_domicilio_calle',
    '$responsable2_domicilio_nro',
    '$responsable2_domicilio_piso',
    '$responsable2_domicilio_entre_calles',
    '$responsable2_domicilio_otro_dato',
    '$responsable2_domicilio_provincia',
    '$responsable2_domicilio_distrito',
    '$responsable2_domicilio_localidad',
    '$responsable2_domicilio_telefono',
    '$responsable2_telefono_celular',
    '$responsable2_email'
);";

if (mysqli_query($conn, $sql_responsable2)) {
    echo "Datos del responsable 2 insertados correctamente.";
} else {
    $error = "Error al insertar los datos del responsable 2: " . mysqli_error($conn);
    logError($error);
    echo $error;
}

$sql = "INSERT INTO ficha_inscripcion (
    nombre_alumno, apellido_alumno, fecha_nacimiento, tiene_dni_argentino, nro_dni_argentino, cuil_alumno, posee_cpi, tipo_documento_extranjero, nro_documento_extranjero, identidad_genero, 
    calle, nro_calle, piso_torre, entre_calles, otro_dato, provincia_actual, distrito, localidad, telefono, telefono_celular, 
    lugar_nacimiento, nacionalidad, provincia_nacimiento, distrito_BA, localidad_BA, tiene_hermanos, cantidad_hermanos, habla_lengua_indigena, habla_otras_lenguas, descendiente_originario, 
    percibe_auh, percibe_progresar, trasporte_pie_bicicleta, trasporte_escolar, trasporte_colectivo, trasporte_tren, trasporte_particular, trasporte_taxi, transporte_otro, hijos_menores, 
    asisten_maternal, tiene_obra_social, nombre_obra_social, nro_afiliado, antecedente_asma, antecedente_celiaquia, antecedente_cardiaco, antecedente_diabetes, antecedente_presion_alta, antecedente_convulsiones, 
    antecedente_alteracion_sanguinea, antecedente_quemaduras_graves, antecedente_organos, antecedente_oncologico, antecedente_inmunodeficiencia, antecedente_fracturas, antecedente_huesos, antecedente_traumatismos, antecedente_problemas_piel, 
    ejercicio_desmayo, ejercicio_dolor_pecho, ejercicio_mareos, ejercicio_mayor_cansancio, ejercicio_palpitaciones, ejercicio_dificultad_respirar, internacion_comun, internacion_intensiva, cant_veces_internado, causa_internacion, 
    antecedente_alergia_grave, alergia_medicamento, internacion_medicamento, alergia_vacuna, internacion_vacuna, alergia_alimento, internacion_alimento, alergia_insectos, internacion_insecto, alergia_estacional, 
    internacion_estacional, alergia_otras, internacion_otras, disminucion_auditiva, usa_audifonos, disminucion_visual, usa_lentes, recibe_medicacion, tipo_medicacion, recibio_operacion, 
    motivo_operacion, fecha_operacion, antecedente_fam_muerte_subita, antecedente_fam_diabetes, antecedente_fam_cardiacos, antecedente_fam_tos_cronica, antecedente_fam_celiaco, establecimiento_actual_distrito, establecimiento_actual_nombre, establecimiento_actual_nro, 
    establecimiento_actual_gestion, establecimiento_procedencia_pais, establecimiento_procedencia_provincia, establecimiento_procedencia_distrito, establecimiento_procedencia_modalidad, establecimiento_procedencia_gestion, establecimiento_procedencia_dependencia, establecimiento_procedencia_nombre, establecimiento_procedencia_nro, inscripcion_modalidad, 
    inscripcion_orientacion, inscripcion_turno, inscripcion_jornada, inscripcion_año, inscripcion_condicion, inscripcion_inclusion, tipo_inclusion, inscripcion_asistente_externo, complementario_centro_educativo, complementario_educacion_fisica, 
    complementario_educacion_estetica, servicio_alimentario, url_firma_responsable, aclaracion_firma, fecha_inscripcion
) VALUES (
    '$nombre_alumno', '$apellido_alumno', '$fecha_nacimiento', '$tiene_dni_argentino', '$nro_dni_argentino', '$cuil_alumno', '$posee_cpi', '$tipo_documento_extranjero', '$nro_documento_extranjero', '$identidad_genero', 
    '$calle', '$nro_calle', '$piso_torre', '$entre_calles', '$otro_dato', '$provincia_actual', '$distrito', '$localidad', '$telefono', '$telefono_celular', 
    '$lugar_nacimiento', '$nacionalidad', '$provincia_nacimiento', '$distrito_BA', '$localidad_BA', '$tiene_hermanos', '$cantidad_hermanos', '$habla_lengua_indigena', '$habla_otras_lenguas', '$descendiente_originario', 
    '$percibe_auh', '$percibe_progresar', '$trasporte_pie_bicicleta', '$trasporte_escolar', '$trasporte_colectivo', '$trasporte_tren', '$trasporte_particular', '$trasporte_taxi', '$transporte_otro', '$hijos_menores', 
    '$asisten_maternal', '$tiene_obra_social', '$nombre_obra_social', '$nro_afiliado', '$antecedente_asma', '$antecedente_celiaquia', '$antecedente_cardiaco', '$antecedente_diabetes', '$antecedente_presion_alta', '$antecedente_convulsiones', 
    '$antecedente_alteracion_sanguinea', '$antecedente_quemaduras_graves', '$antecedente_organos', '$antecedente_oncologico', '$antecedente_inmunodeficiencia', '$antecedente_fracturas', '$antecedente_huesos', '$antecedente_traumatismos', '$antecedente_problemas_piel', 
    '$ejercicio_desmayo', '$ejercicio_dolor_pecho', '$ejercicio_mareos', '$ejercicio_mayor_cansancio', '$ejercicio_palpitaciones', '$ejercicio_dificultad_respirar', '$internacion_comun', '$internacion_intensiva', '$cant_veces_internado', '$causa_internacion', 
    '$antecedente_alergia_grave', '$alergia_medicamento', '$internacion_medicamento', '$alergia_vacuna', '$internacion_vacuna', '$alergia_alimento', '$internacion_alimento', '$alergia_insectos', '$internacion_insecto', '$alergia_estacional', 
    '$internacion_estacional', '$alergia_otras', '$internacion_otras', '$disminucion_auditiva', '$usa_audifonos', '$disminucion_visual', '$usa_lentes', '$recibe_medicacion', '$tipo_medicacion', '$recibio_operacion', 
    '$motivo_operacion', '$fecha_operacion', '$antecedente_fam_muerte_subita', '$antecedente_fam_diabetes', '$antecedente_fam_cardiacos', '$antecedente_fam_tos_cronica', '$antecedente_fam_celiaco', '$establecimiento_actual_distrito', '$establecimiento_actual_nombre', '$establecimiento_actual_nro', 
    '$establecimiento_actual_gestion', '$establecimiento_procedencia_pais', '$establecimiento_procedencia_provincia', '$establecimiento_procedencia_distrito', '$establecimiento_procedencia_modalidad', '$establecimiento_procedencia_gestion', '$establecimiento_procedencia_dependencia', '$establecimiento_procedencia_nombre', '$establecimiento_procedencia_nro', '$inscripcion_modalidad', 
    '$inscripcion_orientacion', '$inscripcion_turno', '$inscripcion_jornada', '$inscripcion_año', '$inscripcion_condicion', '$inscripcion_inclusion', '$tipo_inclusion', '$inscripcion_asistente_externo', '$complementario_centro_educativo', '$complementario_educacion_fisica', 
    '$complementario_educacion_estetica', '$servicio_alimentario', '$url_firma_responsable', '$aclaracion_firma', '$fecha_inscripcion'
)";

if (mysqli_query($conn, $sql)) {
    echo "Registro insertado correctamente.";
    $sql_check = "SELECT id FROM estado_anexo WHERE fk_alumno = (SELECT id_alumno FROM lista_alumnos WHERE dni = '$nro_dni_argentino')";
    $result_check = mysqli_query($conn, $sql_check);
    if (mysqli_num_rows($result_check) > 0) {
        $sql_estado_anexo = "UPDATE estado_anexo SET anexo_2 = 'si' WHERE fk_alumno = (SELECT id_alumno FROM lista_alumnos WHERE dni = '$nro_dni_argentino')";
    } else {
        $sql_estado_anexo = "INSERT INTO estado_anexo (fk_alumno, anexo_2) VALUES ((SELECT id_alumno FROM lista_alumnos WHERE dni = '$nro_dni_argentino'), 'si')";
    }
    if (mysqli_query($conn, $sql_estado_anexo)) {
        echo " Estado del anexo 2 actualizado correctamente.";
    } else {
        $error_estado = "Error al actualizar el estado del anexo 2: " . mysqli_error($conn);
        logError($error_estado);
        echo $error_estado;
    }
} else {
    $error = "Error al insertar el registro: " . mysqli_error($conn);
    logError($error);
    echo $error;
}

} catch (Exception $e) {
logError("Excepción capturada: " . $e->getMessage());
echo "Error: " . $e->getMessage();
} finally {
mysqli_close($conn);
}
?>