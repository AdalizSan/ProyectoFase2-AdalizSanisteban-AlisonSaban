<?php
session_start();
$error = '';
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title >Hotel El Paraíso</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Imagenes/logo.ico" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&family=Lexend+Deca:wght@100..900&family=Permanent+Marker&family=Playwrite+DK+Loopet:wght@100..400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-dark text-light">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="Imagenes/logo.ico" alt="Logo" width="40" class="d-inline-block align-text-top">
                Hotel El Paraíso
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                    <?php 
                        $elementosHeader = [
                            ["directorio" => "#", "Nombre" => "Inicio", "clase"=> "nav-link active"]
                        ];
                        foreach($elementosHeader as $elemento){
                            echo '<li class="nav-item m-2">';
                            echo '<a class="' . $elemento["clase"] . '" href="' . $elemento["directorio"] . '">' . $elemento["Nombre"] . '</a>';
                            echo '</li>';
                        }
                    ?>
                    <li class="nav-item m-2">
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalReserva">
                            Reservar
                        </button>
                    </li>
                    <li class="nav-item m-2">
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalLogin">
                            Iniciar Sesión
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="modal fade" id="modalLogin" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="login.php" class="modal-content">
            <div class="modal-header">
                <h2 class="tropical-header">Inicio de Sesión</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                    <?php if ($error): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    <input type="text" name="usuario" class="form-control mb-2" placeholder="Usuario" required>
                    <input type="password" name="contrasenia" class="form-control" placeholder="Contraseña" required>
                </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Ingresar</button> 
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalReserva" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="reservar.php" class="modal-content">
            <div class="modal-header">
                <h5 class="tropical-header">Reservar Habitación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                    <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre completo" required>
                    <input type="text" name="nit" class="form-control mb-2" placeholder="NIT" required>
                    <label>Fecha de nacimiento</label>
                    <input type="date" name="fecha_nacimiento" class="form-control mb-2" required>
                    <label>Fecha de ingreso</label>
                    <input type="date" name="fecha_ingreso" class="form-control mb-2" required>
                    <label>Fecha de salida</label>
                    <input type="date" name="fecha_salida" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Reservar</button>
            </div>
        </form>
    </div>
</div>
<section class="hero text-center" style="margin-top: 100px;">
    <div class="container">
        <h1 class="tropical-header">Bienvenido al Paraíso 🌴</h1>
        <p class="lead">Tu escape ideal en el corazón de la tranquilidad y el confort.</p>
        <button class="btn btn-warning btn-lg" data-bs-toggle="modal" data-bs-target="#modalReserva">¡Reserva ahora!</button>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-4 flex-md-row-reverse">
            <div class="col-md-6">
                <h2 class="others-tipos">Sobre nuestro hotel</h2>
                <p class="lead">
                    Hotel El Paraíso está diseñado especialmente para brindar comodidad a personas de la tercera edad. 
                    Contamos con 8 habitaciones dobles de fácil acceso, todas ubicadas en un solo nivel. 
                    Nuestro personal está capacitado para proporcionar atención de calidad en un ambiente cálido y relajante.
                </p>
                <ul class="list-unstyled ps-3">
                    <li>✅ Ambiente tranquilo</li>
                    <li>✅ Habitaciones cómodas</li>
                    <li>✅ Servicios especiales: spa, masajes, comidas gourmet</li>
                    <li>✅ Ubicación estratégica cerca de la autopista</li>
                </ul>
            </div>
            <div class="col-md-6 text-center">
                <img src="Imagenes/imagen2Hotel.jpeg" alt="Visión Hotel" class="img-fluid rounded shadow" style="max-height: 400px;">
            </div>
        </div>
    </div>
</section>
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-md-6">
                <h2 class="others-tipos">Misión</h2>
                <p class="lead">
                    Brindar un servicio de hospedaje excepcional y personalizado, especialmente diseñado para personas de la tercera edad, garantizando comodidad, accesibilidad y una estancia tranquila en un entorno adaptado a sus necesidades.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img src="Imagenes/imagen5Hotel.jpeg" alt="Misión Hotel" class="img-fluid rounded shadow" style="max-height: 400px;">
            </div>
        </div>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-4 flex-md-row-reverse">
            <div class="col-md-6">
                <h2 class="others-tipos">Visión</h2>
                <p class="lead">
                    Ser reconocido como el hotel líder en atención especializada para huéspedes mayores, destacando por nuestra ubicación estratégica, servicios personalizados y compromiso con la satisfacción y bienestar de nuestros clientes.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img src="Imagenes/imagen3Hotel.jpeg" alt="Visión Hotel" class="img-fluid rounded shadow" style="max-height: 400px;">
            </div>
        </div>
    </div>
</section>
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-md-6">
                <h2 class="others-tipos">Enfoque</h2>
                <p class="lead">
                    Ubicado en una zona turística, el hotel "El Paraíso" se destaca por su política única de asignación de habitaciones basada en la edad, asegurando que los huéspedes mayores tengan prioridad en las habitaciones más accesibles. Todas las habitaciones son dobles y de la misma categoría, con un costo de Q. 350.00 por noche, complementado con servicios adicionales como desayuno, almuerzo, cena, masajes y spa.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img src="Imagenes/imagen4Hotel.jpeg" alt="Enfoque Hotel" class="img-fluid rounded shadow" style="max-height: 400px;">
            </div>
        </div>
    </div>
</section>
    <?php if ($error): ?>
        <script>
        const loginModal = new bootstrap.Modal(document.getElementById('modalLogin'));
        loginModal.show();
        </script>
    <?php endif; ?>
<footer class="text-center mt-auto">
    <div class="container">
        <p>Hotel El Paraíso</p>
    </div>
</footer>
</body>
</html>

