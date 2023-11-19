<?php
    if (isset($_POST['submit-search'])) {
        $str = mysqli_real_escape_string($conn, $_POST['str']);
        $especialidad = isset($_POST['especialidad']) ? $_POST['especialidad'] : '';
        $sector = isset($_POST['sector']) ? $_POST['sector'] : '';
        $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
        $sql = "SELECT * FROM objeto 
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
    <div class="row">
        <?php
            if(isset($_POST['submit-search'])){
             if(mysqli_num_rows($res) > 0){
                echo "<table class='table table-bordered text-center'>";
                echo '  <th class="bg-dark"></th>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                        <th>Posición</th>
                        <th>Descripción</th>
                        <th>Historia</th>
                        <th>Fecha Ingreso</th>
                        <th>Imagen</th>
                        <th>Modificación</th>
                    ';
                    while ($row = mysqli_fetch_assoc($res)) {
                        $estado = $row['estado'];
                        $backgroundColor = ($estado == 'Activo') ? 'green' : 'red';
                        $redirectLink = ($estado == 'Activo') ? 'delform.php' : 'altamodule.php';
                        $buttonClasses = ($estado == 'Activo') ? 'btn btn-danger bi bi-archive-fill fs-4' : 'btn btn-success bi bi-file-earmark-plus-fill text-light fs-4';

                        echo "<tr>";
                        echo '<td style="background-color:' . $backgroundColor . '"></td>';
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['especialidad'] . "</td>";
                        echo "<td>" . $row['posicion'] . "</td>";
                        echo "<td>" . $row['descripcion'] . "</td>";
                        echo "<td>" . $row['descripcionH'] . "</td>";
                        echo "<td>" . $row['fechaIngreso'] . "</td>";
                        echo '<td>';
                        if (!empty($row['imagen'])) {
                            $imagenPath = $row['imagen'];
                            echo '<img src="' . $imagenPath . '" alt="Imagen del objeto" width="120" height="auto">';
                        } else {
                            echo 'No hay imagen';
                        }
                        echo '</td>';
                        echo '<td>
                                <ul style="list-style: none;" class="d-flex align-items-center">
                                    <li class="me-2">
                                        <a href="edit.php?id=' . $row['id'] . '" class="btn btn-warning bi bi-pen-fill fs-4"></a>
                                    </li>';

                        // Condición para el segundo <li> dependiendo del estado
                        if ($row['estado'] == 'Activo') {
                            echo '<li class="me-2">
                                    <a href="delform.php?id=' . $row['id'] . '" class="btn btn-danger bi bi-archive-fill fs-4"></a>
                                </li>';
                        } else {
                            echo '<li class="me-2">
                                    <a href="altamodule.php?id=' . $row['id'] . '" class="btn btn-success bi bi-file-earmark-plus-fill text-light fs-4"></a>
                                </li>';
                        }

                        echo '<li class="me-2">
                                <a href="bajas.php?id=' . $row['id'] . '" class="btn btn-secondary bi bi-clock-history fs-4"></a>
                            </li>';
                        echo '<li class="me-2">
                                <a href="objeto.php?id=' . $row['id'] . '" class="btn btn-primary bi bi-eye-fill fs-4"></a>
                            </li>
                        </ul></td></tr>';
                    }

                echo "</table>";
                exit;
            } else {
                echo "Ningún Objeto encontrado...";
                exit;
            }
        }
        ?>
    </div>
</div>
