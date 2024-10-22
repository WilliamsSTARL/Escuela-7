<?php
$conn = new mysqli('localhost', 'root', '', 'eesn7');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT u.ID, u.DNI, j.jerarquia AS JERARQUIA, u.NOMBRE 
        FROM usu u
        INNER JOIN jerarquia_usuario j ON u.JERARQUIA = j.id";

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
                            <h3>Nuevo Usuario</h3>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal">
                                USUARIOS
                            </button>
                        </div>

                        <hr>
                        

                        <div class="row">

                            <div class="col-md-6">

                                <div class="formis">
                                    <label for="DNI"><b>DNI</b></label>
                                    <br>
                                    <input type="text" name="Dni" placeholder="Tu respuesta" required>
                                </div>
            
                                <div class="formis">
                                    <label for="Nombre"><b>Nombre</b></label>
                                    <br>
                                    <input type="text" name="Nombre" placeholder="Tu respuesta" required>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="formis">
                                    <label for="Contraseña"><b>Contraseña</b></label>
                                    <br>
                                    <input type="password" name="Contraseña" placeholder="Tu respuesta" required>
                                </div>

                                <div class="formis">
                                    <label for="Curso"><b>Curso</b></label>
                                    <br>
                                    <select name="Cargo" required>
                                        <option value="1">Admin</option>
                                        <option value="2">Directivo</option>
                                        <option value="3">Preceptor</option>
                                        <option value="4">Otro</option>
                                    </select>
                                </div>

                            </div>

                        </div>

                        <center><button type="submit" class="logbtn" onclick="enviarFormulario()">ENVIAR</button></center>
                    </form>

                </div>
            </div>
        </div>    
    </div>

    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Jerarquía</th>
                            <th>Nombre</th>
                            <th>B</th>
                            <th>E</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                    
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td>" . $row["DNI"] . "</td>
                                            <td>" . $row["JERARQUIA"] . "</td>
                                            <td>" . $row["NOMBRE"] . "</td>
                                             <td><button class='btn btn-danger delete-button' data-id='" . $row["ID"] . "'>Borrar</button></td>
                                            <td><button class='btn btn-primary edit-button' data-id='" . $row["ID"] . "' data-dni='" . $row["DNI"] . "' data-jerarquia='" . $row["JERARQUIA"] . "' data-nombre='" . $row["NOMBRE"] . "'>Editar</button></td>
                                          </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No hay usuarios registrados</td></tr>";
                            }

                            $conn->close();
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Usuario</h5>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" name="id" id="edit-id">
                        <div class="mb-3">
                            <label for="edit-dni" class="form-label">DNI</label>
                            <input type="text" class="form-control" id="edit-dni" name="Dni">
                        </div>
                        <div class="mb-3">
                            <label for="edit-jerarquia" class="form-label">Jerarquía</label>
                            <select class="form-control" id="edit-jerarquia" name="Jerarquia">
                                <option value="1">Admin</option>
                                <option value="2">Director</option>
                                <option value="3">Preceptor</option>
                                <option value="4">Otro</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit-nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="edit-nombre" name="Nombre">
                        </div>
                        <div class="mb-3">
                            <label for="edit-contraseña" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="edit-contraseña" name="Contraseña">
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
                            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="jquery.js"></script>
    <!--AJAX--> 
    <script>
       function enviarFormulario() {
            var formData = new FormData(document.getElementById("miFormulario"));
        
            $.ajax({
                url: "nuevousu.php", 
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    window.location.href = "nuevousu1.php";
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        $(document).ready(function() {
            $('.delete-button').click(function() {
                var id = $(this).data('id');

                $.ajax({
                    url: 'delete_user.php',
                    type: 'POST',
                    data: { id: id },
                    success: function(response) {
                        if (response === 'success') {
                            location.reload();
                        } else {
                            console.error('Error al eliminar el usuario');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('.edit-button').click(function() {
                var id = $(this).data('id');
                var dni = $(this).data('dni');
                var jerarquia = $(this).data('jerarquia');
                var nombre = $(this).data('nombre');

                $('#edit-id').val(id);
                $('#edit-dni').val(dni);
                $('#edit-jerarquia').val(jerarquia);
                $('#edit-nombre').val(nombre);

                $('#editModal').modal('show');
            });

            $('#editForm').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: 'update_user.php',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response === 'success') {
                            location.reload();
                        } else {
                            console.error('Error al actualizar el usuario');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
</body>
</html>
