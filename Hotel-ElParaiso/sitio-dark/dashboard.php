<?php
require_once "conexion.php";

$habitaciones = [];

$sql = "SELECT h.id_habitacion AS numero, 
            ceh.nombre AS estado 
        FROM Habitacion h
        JOIN Catalogo_Estado_Habitacion ceh ON h.id_estado_habitacion = ceh.id_estado_habitacion";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $habitaciones[] = [
        "numero" => $row["numero"],
        "ocupada" => strtolower($row["estado"]) === 'ocupada'
    ];
}
$huespedes = [];

$sql = "SELECT c.nombre, 
                TIMESTAMPDIFF(YEAR, c.fecha_nacimiento, CURDATE()) AS edad,
                DATEDIFF(CURDATE(), e.fecha_ingreso) AS noches
        FROM Estancia e
        JOIN Cliente c ON e.id_cliente = c.id_cliente
        WHERE e.fecha_salida IS NULL OR e.fecha_salida > CURDATE()";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $huespedes[] = [
        "nombre" => $row["nombre"],
        "edad" => $row["edad"],
        "noches" => $row["noches"]
    ];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel - Hotel El Paraíso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Imagenes/logo.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-dark text-white">

<nav class="navbar navbar-expand-md fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="Imagenes/logo.ico" alt="Logo" width="30" class="d-inline-block align-text-top me-2">
            Hotel El Paraíso
        </a>
        <div class="ms-auto">
            <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
        </div>
    </div>
</nav>

<section class="text-center mt-5 pt-5">
    <div class="container">
        <h1 class="tropical-header">Bienvenido al Panel 🌴</h1>
        <p class="lead">Gestión interna del Hotel El Paraíso</p>
        <p>Hola <strong><?= htmlspecialchars($_SESSION['usuario']) ?></strong>, aquí puedes ver el estado actual del hotel.</p>
    </div>
</section>

<div class="container mt-4">
    <h3 class="text-warning mt-5 mb-3">Estado de Habitaciones</h3>
    <div class="row g-3">
        <?php foreach ($habitaciones as $habitacion): ?>
            <div class="col-md-3 col-sm-6">
                <div class="card text-center border-0 rounded shadow h-100 
                    <?= $habitacion['ocupada'] ? 'bg-danger' : 'bg-success' ?>">
                    <div class="card-body">
                        <h5 class="card-title">Habitación <?= $habitacion['numero'] ?></h5>
                        <p class="card-text"><?= $habitacion['ocupada'] ? 'Ocupada' : 'Vacía' ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <h3 class="text-warning mt-5 mb-3">Huéspedes Hospedados</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-white bg-dark border-0">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Noches</th>
                    <th>Total a Cobrar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($huespedes as $huesped): ?>
                    <tr>
                        <td class="bg-secondary"><?= htmlspecialchars($huesped['nombre']) ?></td>
                        <td class="bg-secondary"><?= $huesped['edad'] ?></td>
                        <td class="bg-secondary"><?= $huesped['noches'] ?></td>
                        <td class="bg-secondary">Q. <?= number_format($huesped['noches'] * 350, 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
