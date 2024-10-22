<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $conn = new mysqli('localhost', 'root', '', 'eesn7');

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "DELETE FROM usu WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

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
