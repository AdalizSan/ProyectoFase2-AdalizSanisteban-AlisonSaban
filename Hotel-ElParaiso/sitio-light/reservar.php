  
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Reserva</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Imagenes/logo.ico" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex aling-items-center" href="#">
                <img src="Imagenes/logo.ico" alt="Logo" width="40" class="me-2">
                Hotel El Paraíso
            </a>
        </div>
</nav>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = $_POST['nombre'];
    $nit = $_POST['nit'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $fecha_salida = $_POST['fecha_salida'];
    
?>
<section class="container" style="margin-top: 100px";>
    <div class="card text-center">
        <h2>¡Gracias por tu reservación, <?php echo $nombre; ?>!</h2>
        <p class="lead">Hemos recibido los siguientes datos:</p>

        <h4>Nombre:</h4>
        <p><?php echo $nombre; ?></p>

        <h4>NIT:</h4>
        <p><?php echo $nit; ?></p>

        <h4>Fecha de nacimiento:</h4>
        <p><?php echo $fecha_nacimiento; ?></p>

        <h4>Fecha de ingreso:</h4>
        <p><?php echo $fecha_ingreso; ?></p>

        <h4>Fecha de salida:</h4>
        <p><?php echo $fecha_salida; ?></p>

        <p class="mt-4">Nos comunicaremos contigo lo antes posible para confirmar tu reserva.</p>
        <a href="index.php" class="btn btn-home">Volver al inicio</a>
    </div>
    
</section>
<?php } ?>
</body>
</html>

    
