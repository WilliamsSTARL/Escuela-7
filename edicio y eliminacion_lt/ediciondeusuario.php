<?php
include 'conexion.php';

$id = $_GET['id'];

$sql = "SELECT * FROM usuarios WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
  <div class="col-sm-8">
                <div class="search row">

                    <form  id="miFormulario" class="container">

                        <h3>Editar Usuario</h3>
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
                                        <option value="1">Directivo</option>
                                        <option value="2">Preceptor</option>
                                        <option value="3">Alumno</option>
                                        <option value="4">Padre</option>
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
                window.location.href = "nuevousu.html";
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
    </script>
</body>