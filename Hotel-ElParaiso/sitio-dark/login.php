<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];
    if ($usuario === "admin" && $contrasenia === "admin") {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['loggedin'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['error'] = "Usuario o contraseña incorrectos.";
        header("Location: index.php");
        exit();
    }
}
?>
