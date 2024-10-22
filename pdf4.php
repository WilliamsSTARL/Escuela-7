<?php
require('fpdf186/fpdf.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eesn7";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos del alumno
$sql = "SELECT la.`id`, la.`apellido`, la.`nombre`, la.`dni`, la.`domicilio`, loc.`LOCALIDAD` AS localidad, la.`foto`, la.`telefono`, la.`email`, la.`tutor`, c.`CURSO` AS curso, la.`observaciones`, la.`ficha_inscripcion`, la.`dni_alumno`, la.`cuil_alumno`, la.`certificado_nacimiento`, la.`ficha_salud`, la.`vacunas`, la.`certificado_salud`, la.`certificado_oftalmologico`, la.`dni_tutor`, la.`certificado_aprobacion`, la.`otros`, la.`Fecha_nacimiento`, la.`Lugar`, d.`nombre_division` AS Division, la.`Odontologico`, la.`PASE`, la.`AImagen`
        FROM `legajo_alumno` la
        INNER JOIN `localidad` loc ON la.localidad = loc.ID
        INNER JOIN `curso` c ON la.curso = c.ID
        INNER JOIN `division` d ON la.Division = d.id
        WHERE la.id = 15"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $pdf = new FPDF();
    $pdf->AddPage();

    $background_image_path = 'img/im1.jpeg';
    $pdf->Image($background_image_path, 10, 10, 190);

    $pdf->SetFont('Arial', 'B', 11);

    $pdf->SetY(47);
    $pdf->SetX(30);
    $pdf->Cell(0, 10, $row['apellido'], 0, 1);

    $pdf->SetY(57);
    $pdf->SetX(30);
    $pdf->Cell(0, 10,  $row['nombre'], 0, 1);

    $pdf->SetY(69);
    $pdf->SetX(30);
    $pdf->Cell(0, 10, $row['dni'], 0, 1);

    $pdf->SetY(80);
    $pdf->SetX(30);
    $pdf->Cell(0, 10, $row['domicilio'], 0, 1);

    $pdf->SetY(90);
    $pdf->SetX(30);
    $pdf->Cell(0, 10, $row['localidad'], 0, 1);

    $pdf->SetY(102);
    $pdf->SetX(30);
    $pdf->Cell(0, 10, $row['telefono'], 0, 1);

    $pdf->SetY(115);
    $pdf->SetX(30);
    $pdf->Cell(0, 10, $row['email'], 0, 1);

    $pdf->SetY(137);
    $pdf->SetX(30);
    $pdf->Cell(0, 10, $row['tutor'], 0, 1);

    $fotoAlumnoPath = $row['foto'];

    if (!empty($row['foto']) && file_exists($fotoAlumnoPath)) {
        $pdf->SetY(50);
        $pdf->SetX(147); 
        $pdf->Image($fotoAlumnoPath, $pdf->GetX(), $pdf->GetY(), 30);
    } else {
        $pdf->SetY(50);
        $pdf->SetX(147);
        $pdf->Cell(0, 10, 'Sin foto', 0, 1);
    }

    $pdf->SetY(127);
    $pdf->SetX(30);
    $pdf->Cell(0, 10, $row['Fecha_nacimiento'], 0, 1);

    //Other data

    $pdf->SetY(157);
    $pdf->SetX(100);
    $pdf->Cell(0, 10, $row['ficha_inscripcion'], 0, 1);

    $pdf->SetY(165);
    $pdf->SetX(100);
    $pdf->Cell(0, 10, $row['dni_alumno'], 0, 1);

    $pdf->SetY(175);
    $pdf->SetX(100);
    $pdf->Cell(0, 10, $row['cuil_alumno'], 0, 1);

    $pdf->SetY(180);
    $pdf->SetX(100);
    $pdf->Cell(0, 10, $row['certificado_nacimiento'], 0, 1);

    $pdf->SetY(187);
    $pdf->SetX(100);
    $pdf->Cell(0, 10,  $row['ficha_salud'], 0, 1);

    $pdf->SetY(195);
    $pdf->SetX(100);
    $pdf->Cell(0, 10, $row['vacunas'], 0, 1);

    $pdf->SetY(205);
    $pdf->SetX(100);
    $pdf->Cell(0, 10, $row['certificado_salud'], 0, 1);

    $pdf->SetY(213);
    $pdf->SetX(100);
    $pdf->Cell(0, 10, $row['certificado_oftalmologico'], 0, 1);

    $pdf->SetY(220);
    $pdf->SetX(100);
    $pdf->Cell(0, 10, $row['Odontologico'], 0, 1);
    
    $pdf->SetY(227);
    $pdf->SetX(100);
    $pdf->Cell(0, 10, $row['certificado_aprobacion'], 0, 1);

    $pdf->SetY(235);
    $pdf->SetX(100);
    $pdf->Cell(0, 10, $row['PASE'], 0, 1);
    
    $pdf->SetY(245);
    $pdf->SetX(100);
    $pdf->Cell(0, 10, $row['dni_tutor'], 0, 1);

    $pdf->SetY(250);
    $pdf->SetX(100);
    $pdf->Cell(0, 10, $row['AImagen'], 0, 1);

    $pdf->SetY(260);
    $pdf->SetX(100);
    $pdf->Cell(0, 10, $row['otros'], 0, 1);

    $pdf->SetY(157);
    $pdf->SetX(145);
    $pdf->Cell(0, 10, $row['curso'], 0, 1);

    $pdf->SetY(157);
    $pdf->SetX(163);
    $pdf->Cell(0, 10, $row['Division'], 0, 1);

    $pdf->SetY(230);
    $pdf->SetX(125);
    $pdf->Cell(0, 10, $row['observaciones'], 0, 1);


    $pdf->Output('D', 'legajo_alumno.pdf');
} else {
    echo "No se encontraron registros.";
}

$conn->close();
?>