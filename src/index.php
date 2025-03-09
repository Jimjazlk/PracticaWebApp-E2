<?php
$host = 'db';
$db_user = 'usuario';
$db_password = 'password';
$db_name = 'PracticaWebApp';

$conn = new mysqli($host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS mensajes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    mensaje VARCHAR(100) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === FALSE) {
    echo "Error creando tabla: " . $conn->error;
}

$mensaje = "Hola Mundo desde PHP conectado a MySQL!";
$sql = "INSERT INTO mensajes (mensaje) VALUES ('$mensaje')";
$conn->query($sql);

$sql = "SELECT * FROM mensajes ORDER BY fecha DESC";
$result = $conn->query($sql);

echo "<h1>¡Hola, Mundo!</h1>";
echo "<h3>Conexión a MySQL exitosa!</h3>";

if ($result->num_rows > 0) {
    echo "<h3>Mensajes almacenados:</h3>";
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row['mensaje'] . " (creado el " . $row['fecha'] . ")</li>";
    }
    echo "</ul>";
} else {
    echo "No hay mensajes en la base de datos.";
}

$conn->close();
?>