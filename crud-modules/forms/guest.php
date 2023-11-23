<?php
include('../db.php'); // Asegúrate de incluir tu archivo de conexión a la base de datos

// Consulta SQL para obtener todos los objetos
$query = "SELECT * FROM objeto";
$result = mysqli_query($conn, $query);

// Verifica si la consulta fue exitosa
if ($result) {
    // Inicio del HTML
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Objetos</title>
        <!-- Incluye Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    </head>
    <body>
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid d-flex">
            <a class="navbar-brand text-white" href="../../indexmain.php">
            <img src="assets/logokrause.png" alt="Logo" width="50" height="44" class="d-inline-block align-text-top">
            MuseoTech
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../../index.php">Inicio</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <?php 
    include("../findguest.php");
    ?>    
        <div class="container mt-4">
            <h1 class="text-center">Lista de Objetos</h1>

            <div class="row mt-4">
                <?php
                // Recorre los resultados de la consulta
                while ($row = mysqli_fetch_assoc($result)) {
                    // Crea una card para cada objeto
                    ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?php echo $row['imagen']; ?>" class="card-img-top" alt="Imagen del Objeto">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                                <!-- Puedes agregar más detalles según sea necesario -->
                                <a href="objetoguest.php?id=<?php echo $row['id']?>" class="btn btn-primary">Detalles</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

    <?php 
    include("../../includes/footer.php");
    ?> 
    <?php
} else {
    // Maneja el caso en que la consulta falla
    echo "Error en la consulta: " . mysqli_error($conn);
}
?>