<?php
    include('db.php');
    if (isset($_POST['submit-search'])) {
        $str = mysqli_real_escape_string($conn, $_POST['str']);
        $especialidad = isset($_POST['especialidad']) ? $_POST['especialidad'] : '';
        $sector = isset($_POST['sector']) ? $_POST['sector'] : '';
        $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
        $sql = "SELECT id, nombre, imagen FROM objeto 
        WHERE (
            nombre LIKE '%$str%' OR 
            id LIKE '%$str%' OR 
            descripcion LIKE '%$str%' OR 
            descripcionH LIKE '%$str%'
            )";
    
        // Agregar condiciones para el filtro por especialidad y sector
        if ($especialidad != "") {
            $sql .= " AND especialidad = '$especialidad'";
        }
    
        if ($sector != "") {
            // Usar RIGHT para obtener los últimos caracteres (sala) de la columna posicion
            $sql .= " AND RIGHT(posicion, LENGTH(posicion) - 2) = '$sector' OR RIGHT(posicion, LENGTH(posicion) - 1) = '$sector'";
        }
        if ($estado != ""){
                $sql .= " AND estado = '$estado'";
            }
        $res = mysqli_query($conn, $sql);
    } 
?>

<div class="container mt-4 ">
    <div class="container p-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body">
                    <form method="POST" class="d-flex">
                        <input type="text" name="str" placeholder="Buscar objeto..." class="form-control flex-fill me-2">
                        <select name="especialidad" class="form-select flex-fill me-2">
                            <option value="" disabled selected>Especialidad</option>
                            <option value="Construcciones">Construcciones</option>
                            <option value="Computación">Computación</option>
                            <option value="Electrónica">Electrónica</option>
                            <option value="Electricidad">Electricidad</option>
                            <option value="Química">Química</option>
                            <option value="Mecánica">Mecánica</option>
                        </select>
                        <select name="sector" class="form-select flex-fill me-2">
                            <option value="" disabled selected>Sector</option>
                            <option value="SCC">Sector Construcciones</option>  <!-- Construcciones -->
                            <option value="SCP">Sector Computación</option>  <!-- Computación -->
                            <option value="SEL">Sector Electrónica</option>   <!-- Electrónica -->
                            <option value="SLC">Sector Electricidad</option>  <!-- Electricidad -->
                            <option value="SQU">Sector Química</option>  <!-- Química -->
                            <option value="SME">Sector Mecánica</option>    <!-- Mecánica -->
                            <option value="SLD">Sala Davinci</option>  <!-- Davinci -->
                            <option value="SLH">Sala Histórica</option>  <!-- Histórica -->
                            <option value="DEP">Depósito</option>  <!-- Depósito -->
                        </select>
                        <select name="estado" class="form-select flex-fill me-2">
                            <option value="" disabled selected>Estado</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                        <button class="btn btn-success" name="submit-search">
                            Buscar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="container mt-4">
    <br>
    <div class="row">
        <?php
        if (isset($res) && mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                // Construir la URL completa de la imagen
                $imagen_url =  $row['imagen']; // Ajusta 'ruta_base/' según tu estructura de carpetas
                echo '
                <div class="col-md-4 mb-4">
                    <div class="card">
                        
                        <img src="' . $imagen_url . '" class="card-img-top" alt="' . $row['nombre'] . '">
                        <div class="card-body">
                            <h5 class="card-title">' . $row['nombre'] . '</h5>
                            <a href="objetoguest.php?id=' . $row['id'] . '" class="btn btn-primary">Ver Detalles</a>
                        </div>
                    </div>
                </div>';
            }
        } else
        ?>
    </div>
    </div> 
