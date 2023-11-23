<?php
include("../db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Consulta para obtener la información del objeto
    $query = "SELECT * FROM objeto WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $objeto = mysqli_fetch_assoc($result);
        $nombre = $objeto['nombre'];
        $imagen = $objeto['imagen'];
        $descripcion = $objeto['descripcion'];
        $historia = $objeto['descripcionH'];
        $fechaIngreso = $objeto['fechaIngreso'];
    } else {
        // Manejar el caso donde no se encuentra el objeto
        echo "Objeto no encontrado.";
        exit;
    }
} else {
    // Manejar el caso donde no se proporciona un ID
    echo "ID de objeto no proporcionado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $nombre; ?> - Museo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-dark">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <img src="<?php echo $imagen; ?>" class="card-img-top" alt="<?php echo $nombre; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $nombre; ?></h5>
                        <p class="card-text"><?php echo $descripcion; ?></p>
                        <p class="card-text"><small class="text-muted"><?php echo $historia; ?></small></p>
                        <p class="card-text"><small class="text-muted">Fecha de Ingreso: <?php echo $fechaIngreso; ?></small></p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <a href="objetos.php" class="btn btn-primary btn-lg mt-3">Volver</a>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>