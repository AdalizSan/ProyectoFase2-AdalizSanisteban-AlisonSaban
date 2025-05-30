<?php
$host = "bd-hotel";  // IP del contenedor MySQL (PC1)
$db = "bd_hotel";
$user = "root";
$pass = "Admin-123";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
