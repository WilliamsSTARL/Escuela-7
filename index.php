<?php
$host = 'localhost';
$dbname = 'eesn7';
$db_username = 'root';
$db_password = '';

session_start();

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_dni = $_POST['dni'];
    $input_password = $_POST['password'];

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $db_username, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM usu WHERE DNI = :dni");
        $stmt->bindParam(':dni', $input_dni);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($input_password, $user['CONTRASEÑA'])) {
                $_SESSION['user_id'] = $user['ID'];
                $_SESSION['user_dni'] = $user['DNI'];
                $_SESSION['user_nombre'] = $user['NOMBRE'];
                $_SESSION['user_jerarquia'] = $user['JERARQUIA'];

                header("Location: legajos.php");
                exit();
            } else {
                $error_message = 'Contraseña incorrecta. Por favor, inténtelo de nuevo.';
            }
        } else {
            $error_message = 'DNI no encontrado. Por favor, inténtelo de nuevo.';
        }
    } catch (PDOException $e) {
        $error_message = 'Error de conexión a la base de datos: ' . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!--Metadatos-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Titulo-->
    <title>Login - Escuela las toninas</title>
    <!--LINK-->
    <link rel="stylesheet" href="css/cons.css">
    <!--FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="login-container d-flex justify-content-center align-items-center flex-column">    
        <img src="img/logo.png" class="centered-image">       
        <h2 class="h">Escuela N7 Las toninas</h2>
        <!--Mensaje de error-->
        <?php if (!empty($error_message)): ?>
            <div class="error-message"><?php echo htmlspecialchars($error_message); ?></div>
        <?php endif; ?>
    
        <form action="" method="post" class="w-100 d-flex flex-column align-items-center">
            <div class="input-group">
                <input type="text" name="dni" placeholder="DNI" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="CONTRASEÑA" required>
            </div>
            <button type="submit">INGRESAR</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
