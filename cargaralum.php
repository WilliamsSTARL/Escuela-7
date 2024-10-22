<?php
$conn = new mysqli('localhost', 'root', '', 'eesn7');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT 
            a.id_alumno,
            a.dni,
            a.nombre,
            a.apellido,
            a.domicilio,
            l.localidad AS localidad_nombre,
            a.telefono,
            a.tutor_a_cargo,
            c.curso AS curso_nombre,
            d.nombre_division AS division_nombre,
            t.turno AS turno_nombre
        FROM 
            lista_alumnos a
            INNER JOIN localidad l ON a.localidad = l.id
            INNER JOIN curso c ON a.curso = c.ID
            INNER JOIN division d ON a.division = d.id
            INNER JOIN turnos t ON a.turno = t.id";
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
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" href="css/cargar.css">
</head>

<body>
    <!---Contenedor-->
    <div class="container-fluid">

        <!---Header-->
        <div class="row">
            <header class="d-flex align-items-center"> 
                <div class="col-auto"><img src="img/logo.png" alt=""></div>
                <div class="col"><h1>Escuela de educación secundaria N7 - Las Toninas</h1></div>
            </header>
        </div>

        <!---Contenido-->
        <div class="row">
            <div class="col-sm-3">
                <div class="aside1 d-flex flex-column align-items-center justify-content-center">
                    <button class="btn1"><a href="cargaralum.php">CARGAR</a></button>
                    <button class="btn1"><a href="legajos.php">LEGAJOS</a></button>
                    <button class="btn1"><a href="nuevousu1.php">USUARIO</a></button>
                    <button class="btn1"><a href="edicio y eliminacion_lt/back_botones.php">ADMINISTRACION</a></button>
                    <div class="dropdown">
                        <button class="btn btn1 dropdown-toggle white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ANEXOS
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="anexos.html">Legajo personal del alumno</a></li>
                            <li><a class="dropdown-item" href="anexos2.html">Ficha de inscripción</a></li>
                            <li><a class="dropdown-item" href="anexos3.html">Ficha de autorización para educación física</a></li>
                            <li><a class="dropdown-item" href="anexos5.html">Ficha de autorización para uso de imágenes</a></li>
                        </ul>
                    </div>
                    <button class="btn1 red"><a href="index.php">SALIR</a></button>
                </div><br><br>
            </div>

            <div class="col-sm-8">
                <div class="search row">

                    <form id="miFormulario" class="container">
                        <div class="d-flex justify-content-between">
                            <h3>Cargar alumnos nuevos</h3>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal">
                                ALUMNOS
                            </button>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="formis">
                                    <label for="Apellido"><b>Apellido</b></label>
                                    <br>
                                    <input type="text" name="Apellido" placeholder="Tu respuesta" required>
                                </div>
                                <div class="formis">
                                    <label for="Nombre"><b>Nombre</b></label>
                                    <br>
                                    <input type="text" name="Nombre" placeholder="Tu respuesta" required>
                                </div>
                                <div class="formis">
                                    <label for="Domicilio"><b>Domicilio</b></label>
                                    <br>
                                    <input type="text" name="Domicilio" placeholder="Tu respuesta" required>
                                </div>
                                <div class="formis">
                                    <label for="Telefono"><b>Telefono</b></label>
                                    <br>
                                    <input type="text" name="Telefono" placeholder="Tu respuesta" required>
                                </div>
                                <div class="formis">
                                    <label for="Tutor"><b>Tutor</b></label>
                                    <br>
                                    <input type="text" name="Tutor" placeholder="Tu respuesta" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="formis">
                                    <label for="DNI"><b>DNI</b></label>
                                    <br>
                                    <input type="text" name="DNI" placeholder="Tu respuesta" required>
                                </div>
                                <div class="formis">
                                    <label for="Curso"><b>Curso</b></label>
                                    <br>
                                    <select name="Curso" required>
                                        <option value="1">1ero</option>
                                        <option value="2">2ndo</option>
                                        <option value="3">3ero</option>
                                        <option value="4">4to</option>
                                        <option value="5">5to</option>
                                        <option value="6">6to</option>
                                    </select>
                                </div>
                                <div class="formis">
                                    <label for="Division"><b>Division</b></label>
                                    <br>
                                    <select name="Division" required>
                                        <option value="1">1era</option>
                                        <option value="2">2nda</option>
                                        <option value="3">3era</option>
                                        <option value="4">4ta</option>
                                        <option value="5">5ta</option>
                                        <option value="6">6ta</option>
                                    </select>
                                </div>
                                <div class="formis">
                                    <label for="Turno"><b>Turno</b></label>
                                    <br>
                                    <select name="Turno" required>
                                        <option value="1">Mañana</option>
                                        <option value="2">Tarde</option>
                                        <option value="3">Noche</option>
                                    </select>
                                </div>
                                <div class="formis">
                                    <label for="Localidad"><b>Localidad</b></label>
                                    <br>
                                    <select name="Localidad" required>
                                        <option value="1">Santa Teresita</option>
                                        <option value="2">Las Toninas</option>
                                        <option value="3">Mar del Tuyu</option>
                                        <option value="4">Costa del Este</option>
                                        <option value="5">Mar de Ajo</option>
                                        <option value="6">San Clemente</option>
                                        <option value="7">San Bernardo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <center><button type="submit" class="logbtn">ENVIAR</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="userModal" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
            </div>
            <div class="modal-body">
                    <div class="table-responsive">                
                    <table class="table table-bordered">
                    <thead>
                                <tr>
                                    <th>DNI</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Domicilio</th>
                                    <th>Localidad</th>
                                    <th>Teléfono</th>
                                    <th>Tutor</th>
                                    <th>Curso</th>
                                    <th>División</th>
                                    <th>Turno</th>
                                    <th>B</th>
                                    <th>E</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['dni']}</td>
                                        <td>{$row['nombre']}</td>
                                        <td>{$row['apellido']}</td>
                                        <td>{$row['domicilio']}</td>
                                        <td>{$row['localidad_nombre']}</td>
                                        <td>{$row['telefono']}</td>
                                        <td>{$row['tutor_a_cargo']}</td>
                                        <td>{$row['curso_nombre']}</td>
                                        <td>{$row['division_nombre']}</td>
                                        <td>{$row['turno_nombre']}</td>
                                        <td><button class='btn btn-danger delete-button' data-id='{$row['id_alumno']}'>Borrar</button></td>
                                        <td><button class='btn btn-primary edit-button' data-id='{$row['id_alumno']}' data-dni='{$row['dni']}' data-nombre='{$row['nombre']}' data-apellido='{$row['apellido']}' data-domicilio='{$row['domicilio']}' data-localidad='{$row['localidad_nombre']}' data-telefono='{$row['telefono']}' data-tutor='{$row['tutor_a_cargo']}' data-curso='{$row['curso_nombre']}' data-division='{$row['division_nombre']}' data-turno='{$row['turno_nombre']}'>Editar</button></td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='13'>No hay alumnos registrados</td></tr>";
                        }
                        ?>
                            </tbody>
                        </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>


    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Usuario</h5>
                </div>
                <div class="modal-body">
                <form id="editForm">
                    <input type="hidden" name="id_alumno" id="edit-id-alumno">
                    <div class="form-group">
                        <label for="edit-dni">DNI</label>
                        <input type="text" class="form-control" name="dni" id="edit-dni" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="edit-nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-apellido">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="edit-apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-domicilio">Domicilio</label>
                        <input type="text" class="form-control" name="domicilio" id="edit-domicilio" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-localidad">Localidad</label>
                                    <select name="localidad" class="form-control" id="edit-localidad" required>
                                        <option value="1">Santa Teresita</option>
                                        <option value="2">Las Toninas</option>
                                        <option value="3">Mar del Tuyu</option>
                                        <option value="4">Costa del Este</option>
                                        <option value="5">Mar de Ajo</option>
                                        <option value="6">San Clemente</option>
                                        <option value="7">San Bernardo</option>
                                    </select>
                    </div>
                    <div class="form-group">
                        <label for="edit-telefono">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" id="edit-telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-tutor">Tutor</label>
                        <input type="text" class="form-control" name="tutor" id="edit-tutor" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-curso">Curso</label>
                        <select class="form-control" name="curso" id="edit-curso" required>
                            <option value="1">1ero</option>
                            <option value="2">2ndo</option>
                            <option value="3">3ero</option>
                            <option value="4">4to</option>
                            <option value="5">5to</option>
                            <option value="6">6to</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit-division">División</label>
                        <select class="form-control" name="division" id="edit-division" required>
                            <option value="1">1era</option>
                            <option value="2">2nda</option>
                            <option value="3">3era</option>
                            <option value="4">4ta</option>
                            <option value="5">5ta</option>
                            <option value="6">6ta</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit-turno">Turno</label>
                        <select class="form-control" name="turno" id="edit-turno" required>
                            <option value="1">Mañana</option>
                            <option value="2">Tarde</option>
                            <option value="3">Noche</option>
                        </select>
                    </div><br>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#miFormulario').submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: 'section.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        window.location.href = "cargaralum.php";
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
        $(document).on('click', '.delete-button', function() {
            var id = $(this).data('id');
            if (confirm("¿Estás seguro de que deseas borrar este alumno?")) {
                $.ajax({
                    url: 'delete_user2.php',
                    type: 'POST',
                    data: { id: id },
                    success: function(response) {
                        if (response === "success") {
                            alert("Alumno borrado correctamente.");
                            location.reload();
                        } else {
                            alert("Error al borrar el alumno.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });
        
    $(document).on('click', '.edit-button', function() {
        var id = $(this).data('id');
        var dni = $(this).data('dni');
        var nombre = $(this).data('nombre');
        var apellido = $(this).data('apellido');
        var domicilio = $(this).data('domicilio');
        var localidad = $(this).data('localidad');
        var telefono = $(this).data('telefono');
        var tutor = $(this).data('tutor');
        var curso = $(this).data('curso');
        var division = $(this).data('division');
        var turno = $(this).data('turno');

        $('#edit-id-alumno').val(id);
        $('#edit-dni').val(dni);
        $('#edit-nombre').val(nombre);
        $('#edit-apellido').val(apellido);
        $('#edit-domicilio').val(domicilio);
        $('#edit-localidad').val(localidad);
        $('#edit-telefono').val(telefono);
        $('#edit-tutor').val(tutor);
        $('#edit-curso').val(curso);
        $('#edit-division').val(division);
        $('#edit-turno').val(turno);

        $('#editModal').modal('show');
    });

    $('#editForm').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: 'update_user2.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response === "success") {
                    alert("Datos actualizados correctamente.");
                    location.reload();
                } else {
                    alert("Error al actualizar los datos.");
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

    </script>
</body>
</html>
