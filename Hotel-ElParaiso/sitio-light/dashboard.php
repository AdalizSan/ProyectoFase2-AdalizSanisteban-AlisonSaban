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
<html lang="en">
<head>
    <title>Hotel El Paraíso</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Imagenes/logo.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="Imagenes/logo.ico" alt="Logo" width="40" class="d-inline-block align-text-top">
                Hotel El Paraíso
            </a>
            <div class="ms-auto">
                    <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
            </div>
        </div>
    </nav>


    <div class="container mt-5 pt-5">
        <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h2>
        <p>Esta es la sección privada para empleados.</p>
    </div>
<div class="container mt-4">
    <h3 class="text-warning mt-5 mb-3">Estado de Habitaciones</h3>
    <div class="row">
        <?php foreach ($habitaciones as $habitacion): ?>
            <div class="col-md-3 mb-3">
                <div class="card text-center <?php echo $habitacion['ocupada'] ? 'bg-danger text-white' : 'bg-success text-white'; ?>">
                    <div class="card-body">
                        <h5 class="card-title">Habitación <?php echo $habitacion['numero']; ?></h5>
                        <p class="card-text"><?php echo $habitacion['ocupada'] ? 'Ocupada' : 'Vacía'; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Sección de Huéspedes -->
<h3>Huéspedes Hospedados</h3>
<table class="table table-striped">
    <thead>
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
                <td><?php echo htmlspecialchars($huesped['nombre']); ?></td>
                <td><?php echo $huesped['edad']; ?></td>
                <td><?php echo $huesped['noches']; ?></td>
                <td>Q. <?php echo number_format($huesped['noches'] * 350, 2); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

