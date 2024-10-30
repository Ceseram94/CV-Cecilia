<?php
$servername = "localhost";
$username = "root"; // Cambia esto si tienes un usuario diferente
$password = ""; // Cambia esto si tienes una contraseña diferente
$dbname = "comentarios_web";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Preparar y vincular
$stmt = $conn->prepare("INSERT INTO comentarios (nombre, numero, comentario) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $numero, $comentario);

// Establecer parámetros y ejecutar
$nombre = htmlspecialchars($_POST['nombre']);
$numero = htmlspecialchars($_POST['numero']);
$comentario = htmlspecialchars($_POST['comentario']);
$stmt->execute();

echo "Comentario enviado exitosamente";

$stmt->close();
$conn->close();
?>
