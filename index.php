
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MuseoTech</title>
    
    <!-- BOOTSRAP 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

<style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background-image: url('crud-modules/forms/assets/Otto.jpg'); /* Ruta a tu imagen de fondo */
            background-size: cover;
            background-position: center;
        }
    </style>

    <!-- <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
        <img src="crud-modules/forms/assets/logokrause.png" alt="Logo" width="50" height="44" class="d-inline-block align-text-top">
        MuseoTech
        </a>
    </div>
    </nav>  Esta comentado por si quieren ponerle un header a esta vista-->
    <br>
    <br>
    <div class="container card bg-danger text-white" style="height: auto; width: 40%;">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="text-center">
                    <h1>Bienvenido/a</h1>
                    <p>Por Favor elija una opción:</p>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <a href="login-modules/login.php" class="btn btn-primary mr-3 m-4 bi bi-door-open-fill" style="font-size: 2rem;">
                    <p style="font-size: 1rem;">Ingresar</p>
                    </a>
                    <a href="login-modules/registro.php" class="btn btn-success m-4 bi bi-pencil-square" style="font-size: 2rem;">
                    <p style="font-size: 1rem;">Registro</p>
                    </a>
                    <a href="crud-modules/forms/guest.php" class="btn btn-warning m-4 bi bi-person-video3 text-white" style="font-size: 2rem;">
                    <p style="font-size: 1rem;">Invitado</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php') ?>