<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eesn7";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de los alumnos
$sql = "SELECT id_alumno, dni, nombre, apellido, domicilio, localidad, telefono, tutor_a_cargo, curso, division, turno 
        FROM lista_alumnos";
$result = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!--MetaDatos-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Titulo-->
    <title>EESN7</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <!--FontAwesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!--LINK-->
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
        .modal {
            background-color: rgba(0, 0, 0, 0);
        }
        .modal-dialog {
            margin: 0 auto;
        }
</style>
<body>
     <!---Contenedor-->
     <div class="container-fluid">

<!---Header-->
<div class="row">
    <header class="d-flex align-items-center">
        <div class="col-auto"><img src="img/logo.png" alt=""></div>
        <div class="col">
            <h1>Escuela de educacion secundaria N7 - Las toninas</h1>
        </div>
    </header>
</div>

<!---Contenido-->
<div class="row">
    <div class="col-sm-3">
        <div class="aside1 d-flex flex-column align-items-center justify-content-center">

        <a href="cargaralum.php"><button class="btn1">CARGAR</button></a>
        <a href="legajos.php"><button class="btn1">LEGAJOS</button></a>
        <a href="nuevousu1.php"><button class="btn1">USUARIO</button></a>
            <div class="dropdown">
                    <button class="btn btn1 dropdown-toggle white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      ANEXOS
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="anexos.html">Legajo personal del alumno</a></li>
                        <li><a class="dropdown-item" href="anexos2.html">Ficha de inscripcion</a></li>
                        <li><a class="dropdown-item" href="anexos3.html">Ficha de Autorizacion para Educacion Fisica</a></li>
                        <li><a class="dropdown-item" href="anexos5.html">Ficha de Autorizacion para uso de imagenes</a></li>
                    </ul>
            </div>
            <button class="btn1 red"><a href="index.php">Salir</a></button>

        </div><br><br>
    </div>

    <div class="col-sm-9">

        <div class="search">

            <div class="navbar">
                <div class="container">
                    <h3>Legajos</h3>
                    <form class="search-form">
                        <input type="text" class="search-input" placeholder="Buscar">
                        <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>

            <div class="show d-flex flex-wrap justify-content-center align-items-center">
            <form action="pdf1.php" method="post">
                <button type="submit">Descargar PDF 4</button>
            </form>
            <form action="pdf4.php" method="post">
                <button type="submit">Descargar PDF 1</button>
            </form>
            <form action="pdf3.php" method="post">
                <button type="submit">Descargar PDF 3</button>
                <h5>Ficha de Salud y autorizacion para hacer Educacion Fisica</h5>
            </form>
            <form action="pdf2.php" method="post">
                <button type="submit">Descargar PDF 2</button>
                <h5>Ficha de inscripcion</h5>
            </form>
            <?php
                if ($result->num_rows > 0) {
                    while ($fila = $result->fetch_assoc()) {
                        $id_alumno = $fila["id_alumno"];
                        $nombre = $fila["nombre"];
                        $apellido = $fila["apellido"];
                        $dni = $fila["dni"];
                        
                        echo '<button type="button" class="btn btn-primary btn-lg btn-block" data-bs-toggle="modal" data-bs-target="#modalLegajo' . $id_alumno . '">' . $nombre . ' ' . $apellido . '</button>';

                        $sql_legajo = "SELECT * FROM legajo_alumno WHERE dni_alumno = '$dni'";
                        $result_legajo = $conn->query($sql_legajo);
                        $legajo_data = $result_legajo->fetch_assoc();
                        $sql_anexos = "SELECT * FROM estado_anexo WHERE fk_alumno = '$id_alumno'";
                        $result_anexo = $conn->query($sql_anexos);
                        $anexos_data = $result_anexo->fetch_assoc();

                        echo '
                        <div class="modal fade" id="modalLegajo' . $id_alumno . '" tabindex="-1" aria-labelledby="modalLegajoLabel' . $id_alumno . '" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLegajoLabel' . $id_alumno . '">' . $nombre . ' ' . $apellido . '</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-auto">
                                                <p><strong>Nombre:</strong> ' . $nombre . '</p>
                                                <p><strong>Apellido:</strong> ' . $apellido . '</p>
                                                <p><strong>DNI:</strong> ' . $dni . '</p>
                                                <p><strong>Domicilio:</strong> ' . $fila["domicilio"] . '</p>
                                                <p><strong>Localidad:</strong> ' . $fila["localidad"] . '</p>
                                            </div>
                                            <div class="col-md-6 col-sm-auto">
                                                <p><strong>Teléfono:</strong> ' . $fila["telefono"] . '</p>
                                                <p><strong>Tutor a cargo:</strong> ' . $fila["tutor_a_cargo"] . '</p>
                                                <p><strong>Curso:</strong> ' . $fila["curso"] . '</p>
                                                <p><strong>División:</strong> ' . $fila["division"] . '</p>
                                                <p><strong>Turno:</strong> ' . $fila["turno"] . '</p>
                                            </div>
                                            <div class="col-md-auto">
                                                <p><strong>Anexos:</strong></p>
                                                <div class="d-flex flex-wrap justify-content-center align-items-center">';
                                                for ($i = 1; $i <= 4; $i++) {
                                                    if ($i == 4) {
                                                        $archivo = "anexos5.html?usuario_id=" . $id_alumno;
                                                    } else {
                                                        $archivo = "anexos" . ($i == 1 ? "" : $i) . ".html?usuario_id=" . $id_alumno;
                                                    }
                                                    if (isset($anexos_data['anexo_' . $i]) && $anexos_data['anexo_' . $i] == 'si') {
                                                        echo '<a href="' . $archivo . '" class="btn btn-info m-1">Anexo ' . $i . '</a>';
                                                    } elseif (isset($anexos_data['anexo_' . $i]) && $anexos_data['anexo_' . $i] == 'no') {
                                                        echo '<button class="btn btn-secondary m-1" disabled>Anexo ' . $i . ' (No disponible)</button>';
                                                    }
                                                }
                                                echo '</div>
                                            </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                        </div>';
                    }
                } else {
                    echo "No se encontraron alumnos.";
                }

                $conn->close();
            ?>
            </div>

        </div>
    </div>
</div>

<!-- LEGAJO -->
<div class="modal fade" id="modalLegajo" tabindex="-1" aria-labelledby="modalLegajoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalLegajoLabel">Legajo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Legajo
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<!-- FICHA DE INSCRIPCION -->
<div class="modal fade" id="modalFichaInscripcion" tabindex="-1" aria-labelledby="modalFichaInscripcionLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalFichaInscripcionLabel">Ficha inscripcion</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Ficha inscripcion
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalFichaEF" tabindex="-1" aria-labelledby="modalFichaEFLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalFichaEFLabel">FICHA PARA AUTORIZACION DE E.F</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        FICHA PARA AUTORIZACION DE E.F
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- AUTORIZACION DE IMAGEN -->
<div class="modal fade" id="modalAutorizacionImagen" tabindex="-1" aria-labelledby="modalAutorizacionImagenLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalAutorizacionImagenLabel">AUTORIZACION DE IMAGEN</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        AUTORIZACION DE IMAGEN
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    $('button[data-toggle="modal"]').click(function() {
        var modalTarget = $(this).attr('data-target');
        $(modalTarget).modal('show');
    });

    $('button[data-dismiss="modal"]').click(function() {
        var modal = $(this).closest('.modal');
        modal.modal('hide');
    });
});
</script>   
</body>
</html>