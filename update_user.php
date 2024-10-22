<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $dni = $_POST['Dni'];
    $jerarquia = $_POST['Jerarquia'];
    $nombre = $_POST['Nombre'];
    $contraseña = $_POST['Contraseña'];

    $conn = new mysqli('localhost', 'root', '', 'eesn7');

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    if (!empty($contraseña)) {
        $contraseñaEncriptada = password_hash($contraseña, PASSWORD_DEFAULT);
        $sql = "UPDATE usu SET DNI = ?, JERARQUIA = ?, NOMBRE = ?, CONTRASEÑA = ? WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $dni, $jerarquia, $nombre, $contraseñaEncriptada, $id);
    } else {
        $sql = "UPDATE usu SET DNI = ?, JERARQUIA = ?, NOMBRE = ? WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $dni, $jerarquia, $nombre, $id);
    }

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'error';
}
?>
