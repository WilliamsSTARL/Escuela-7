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

$sql = "SELECT `NombreHijo`, `DNI_Hijo`, `FirmaTuto r`, `Aclaracion`, `DNI_Tutor`, `Lugar`, `Fecha` FROM `autorizacion_imagen` WHERE id = 4"; // Cambia el ID por el alumno deseado
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $pdf = new FPDF();
    $pdf->AddPage();

    // Añadir la imagen de fondo (si es necesario)
    $pdf->Image('img/ima.jpeg', 25, 25, 182);

    // Configuración de la fuente
    $pdf->SetFont('Arial', 'B', 11);

    // Mostrar datos del hijo
    $pdf->SetY(58);
    $pdf->SetX(85); 
    $pdf->Cell(0, 8, $row['NombreHijo'], 20, 1);
    
    $pdf->SetY(65);
    $pdf->SetX(62); 
    $pdf->Cell(0, 3, $row['DNI_Hijo'], 0, 1);
    
    // Mostrar la imagen de la firma
    $firmaTutorPath = 'uploads/' . $row['FirmaTutor'];

    if (!file_exists($firmaTutorPath)) {
        die("La imagen no existe: $firmaTutorPath");
    }
    $pdf->SetY(100);
    $pdf->SetX(150); 
    $pdf->Image($firmaTutorPath, $pdf->GetX(), $pdf->GetY(), 30); // Ajusta el tamaño de la imagen según necesites

    $pdf->SetY(85);
    $pdf->SetX(80);
    $pdf->Cell(0, 55, $row['Aclaracion'], 0, 1);
    
    $pdf->SetY(95);
    $pdf->SetX(80); 
    $pdf->Cell(0, 50,  $row['DNI_Tutor'], 0, 1);
    
    $pdf->SetY(108);
    $pdf->SetX(80); 
    $pdf->Cell(0, 40, $row['Lugar'], 0, 1);
    
    $pdf->SetY(118);
    $pdf->SetX(100); 
    $pdf->Cell(0, 20, $row['Fecha'], 0, 1);

    $pdf->Output('D', 'autorizacion_imagen.pdf');
} else {
    echo "No se encontraron registros.";
}

$conn->close();
?>
