<?php 
  include('../db.php');
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bajas</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="editform.php">
        <img src="assets/logokrause.png" alt="Logo" width="50" height="44" class="d-inline-block align-text-top">
        MuseoTech
        </a>
        <a href="../../login-modules/logout.php" class="navbar-brand text-white">Cerrar Sesión</a>
    </div>
    </nav>

      <!-- Main Content -->
      <div class="container mt-4">
        <h1 class="text-center">Dar de Alta Un Objeto:</h1>
      </div>

    <div class="d-flex justify-content-center mt-4 gx-4">
    <!-- List of Items Below the Navbar and Form -->
    <div class="d-flex flex-row">
        <div class="card-container mr-3" style="margin-right: 50px;">
            <div class="card" style="width: 18rem;">
                <i class="bi bi-compass text-success" style="font-size: 4rem; text-align: center;"></i>
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <h5 class="card-title">En Posición Anterior</h5>
                    <a href="../oldposicion.php?id=<?php echo $id; ?>" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
        <div class="card-container mr-3" style="margin-left: 50px;">
            <div class="card" style="width: 18rem;">
                <i class="bi bi-geo-alt-fill text-success-emphasis" style="font-size: 4rem; text-align: center;"></i>
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <h5 class="card-title">En Nueva Posición</h5>
                    <a href="neuform.php?id=<?php echo $id; ?>" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
    </div>
    </div>


<!-- Include Bootstrap JS and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>
