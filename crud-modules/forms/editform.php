<?php 
  include('../db.php');
    session_start();
  if (!isset($_SESSION['user_id'])) {
    // Redirigir a la página de inicio de sesión si no está autenticado
    echo '
            <script>
                alert("Por Favor Inicie Sesión!");
                window.location = "../../login-modules/login.php";
            </script>';
    exit;
}
?>
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

<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid d-flex">
        <a class="navbar-brand text-white" href="../dashboard.php">
        <img src="assets/logokrause.png" alt="Logo" width="50" height="44" class="d-inline-block align-text-top">
        MuseoTech
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../dashboard.php">Inicio</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="addform.php">Añadir</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="objetos.php">Ver objetos</a>
            </li>
            <li class="nav-item">
            <a href="../../login-modules/logout.php" class="nav-link text-white">Cerrar Sesión</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <?php 
    include('../find.php');
    ?>
        

        
<div class="container p-4">
    <div class="d-flex flex-column align-items-center align-self-start ml-auto" style="margin-left: auto; float: left;">
        <a href="addform.php" class="bi bi-plus-square-fill text-success" style="font-size: 2rem; text-align: center;"></a>
    </div>
    <div class="row">
        </div>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th class="bg-dark"></th>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                        <th>Posición</th>
                        <th>Descripción</th>
                        <th>Historia</th>
                        <th>Fecha de Ingreso</th>
                        <th>Imagen</th> 
                        <th>Acciones</th>                       
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT id, nombre, especialidad, posicion, imagen, descripcion, descripcionh, fechaIngreso, estado FROM objeto";
                        $result_add = mysqli_query($conn, $query);
                        
                        while($row = mysqli_fetch_array($result_add)) {
                            
                            $estado = $row['estado'];
                            $backgroundColor = ($estado == 'Activo') ? 'green' : 'red';
                            $redirectLink = ($estado == 'Activo') ? 'delform.php' : 'altamodule.php';
                            $buttonClasses = ($estado == 'Activo') ? 'btn btn-danger bi bi-archive-fill fs-4' : 'btn btn-success bi bi-file-earmark-plus-fill text-light fs-4';
                            
                            ?>
                        <tr>
                            <td style="background-color: <?php echo $backgroundColor; ?>"></td>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['nombre']?></td>
                            <td><?php echo $row['especialidad']?></td>
                            <td><?php echo $row['posicion']?></td>
                            <td><?php echo $row['descripcion']?></td>
                            <td><?php echo $row['descripcionh']?></td>
                            <td><?php echo $row['fechaIngreso']?></td>
                            <td>
                                <?php
                                // Verifica si hay una URL de imagen disponible
                                if (!empty($row['imagen'])) {
                                    $imagenPathURL = $row['imagen'];
                                    echo '<img src="' . $imagenPathURL . '" alt="Imagen del objeto" width="120" height="auto">';
                                } else {
                                    echo 'No hay imagen';
                                }
                                ?>
                            </td>
                            <td>
                            <ul style="list-style: none;" class="d-flex align-items-center">
                                <li class="me-2">
                                    <a href="edit.php?id=<?php echo $row[0]?>" class="btn btn-warning bi bi-pen-fill fs-4"></a>
                                </li>
                                <li class="me-2">
                                    <a href="<?php echo $redirectLink ?>?id=<?php echo $row['id'] ?>" class="<?php echo $buttonClasses ?>"></a>
                                </li>
                                <li class="me-2">
                                    <a href="bajas.php?id=<?php echo $row[0]?>" class="btn btn-secondary bi bi-clock-history fs-4"></a>
                                </li>
                                <li class="me-2">
                                    <a href="objeto.php?id=<?php echo $row[0]?>" class="btn btn-primary bi bi-eye-fill fs-4"></a>
                                </li>
                            </ul>    
                            </td>
                        </tr>
                    <?php }?>            
                </tbody>
            </table>
        <div class="col-md-8">

        </div>
    </div>
</div>   
<?php include('../../includes/footer.php') ?>