<?php 
    include('db.php');
    session_start();

    // Verificar si el usuario está autenticado
    if (!isset($_SESSION['user_id'])) {
        // Redirigir a la página de inicio de sesión si no está autenticado
        echo '
                <script>
                    alert("Por Favor Inicie Sesión!");
                    window.location = "../login-modules/login.php";
                </script>';
        exit;
    }

    // Obtener el ID del usuario de la sesión
    $user_id = $_SESSION['user_id'];

    // Consultar la base de datos para obtener el nombre del usuario
    $nomquery = "SELECT nombre FROM usuario WHERE id = $user_id";
    $result = mysqli_query($conn, $nomquery);

    // Verificar si la consulta fue exitosa
    if ($result) {
        // Obtener el nombre del usuario
        $row = mysqli_fetch_assoc($result);
        $nombre_usuario = $row['nombre'];
    } else {
        // Manejar el caso donde la consulta falla
        $nombre_usuario = "Usuario Desconocido";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="crud-css/styles.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid d-flex">
        <a class="navbar-brand text-white" href="dashboard.php">
        <img src="forms/assets/logokrause.png" alt="Logo" width="50" height="44" class="d-inline-block align-text-top">
        MuseoTech
        </a>
        <a class="navbar-brand active bi bi-person-fill text-white fs-5" aria-current="page"><?php echo $nombre_usuario; ?></a> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="dashboard.php">Inicio</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="forms/addform.php">Añadir</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="forms/objetos.php">Ver objetos</a>
            </li>
            <li class="nav-item">
            <a href="../login-modules/logout.php" class="nav-link text-white">Cerrar Sesión</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>


    <div class="container mt-4">
        <h1 class="text-center">Bienvenido, <?php echo $nombre_usuario; ?></h1>
    </div>
    <!-- Main Content -->
    <div class="d-flex justify-content-center mt-4">
        <!-- List of Items Below the Navbar and Form -->
        <ul class="list-group d-flex flex-row">
            <li class="list-group-item mr-3">
                <div class="card" style="width: 18rem;">
                        <i class="bi bi-clipboard-data-fill text-primary-emphasis" style="font-size: 4rem; text-align: center;"></i>
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <h5 class="card-title">Modificación Y Consulta</h5>
                        <a href="forms/editform.php?id=<?php echo $_SESSION['user_id']; ?>" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>