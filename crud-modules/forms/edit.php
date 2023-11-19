<?php

include("../db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM objeto WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $name = $row['nombre'];
        $esp = $row['especialidad'];
        $desc = $row['descripcion'];
        $history = $row['descripcionH'];
        $imagen = $row['imagen'];
    }
}

if (isset($_POST['edit'])) {
    $id = $_GET['id'];
    $name = $_POST['nombre'];
    $esp = $_POST['especialidad'];
    $desc = $_POST['descripcion'];
    $history = $_POST['historia'];

    // Verifica si se ha seleccionado una nueva imagen
    if (!empty($_FILES["imagen"]["name"])) {
        $imagenDir = "assets/imgobject/";
        $imagenPath = $imagenDir . basename($_FILES["imagen"]["name"]);

        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $imagenPath)) {
            // La imagen se cargó exitosamente, actualiza la ruta en la base de datos
            $query = "UPDATE objeto SET nombre = '$name', especialidad = '$esp', descripcion = '$desc', descripcionH = '$history', imagen = '$imagenPath' WHERE id = $id";
            if (mysqli_query($conn, $query)) {
                echo '<script>
                    alert("Objeto actualizado!");
                    window.location = "editform.php";
                </script>';
            } else {
                echo "Error al actualizar el objeto: " . mysqli_error($conn);
            }
        } else {
            echo "Error al cargar la imagen.";
        }
    } else {
        // No se ha seleccionado una nueva imagen, actualiza los demás campos
        $noimagequery = "UPDATE objeto SET nombre = '$name', especialidad = '$esp', descripcion = '$desc', descripcionH = '$history' WHERE id = $id";
        if (mysqli_query($conn, $noimagequery)) {
            echo '<script>
                    alert("Objeto actualizado!");
                    window.location = "editform.php";
                </script>';
        } else {
            echo "Error al actualizar el objeto: " . mysqli_error($conn);
        }
    }
}

?>

<?php 
  include('../../includes/header-form.php');
?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body">
                    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="nombre" value="<?php echo $name; ?>" class="form-control" placeholder="Actualice el nombre">    
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="especialidad">Especialidad:</label>
                            <select name="especialidad" class="form-select" required>
                                <option value="<?php echo $esp; ?>"><?php echo $esp; ?></option>
                                <option value="Construcciones">Construcciones</option>
                                <option value="Computación">Computación</option>
                                <option value="Electrónica">Electrónica</option>
                                <option value="Electricidad">Electricidad</option>
                                <option value="Química">Química</option>
                                <option value="Mecánica">Mecánica</option>
                            </select>   
                        </div>
                        <br>
                        <div class="form-group">
                            <textarea name="descripcion" rows="2" class="form-control" placeholder="Actualice la descripción">
                                <?php echo $desc; ?>
                            </textarea>   
                        </div>
                        <br>
                        <div class="form-group">
                            <textarea name="historia" rows="2" class="form-control" placeholder="Actualice la descripción histórica">
                                <?php echo $history; ?>
                            </textarea>      
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="imagen">Imagen:</label>
                            <input type="file" name="imagen" class="form-control">
                        </div>
                        <br>
                        <button class="btn btn-primary" name="edit">
                            Modificar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include("../../includes/footer.php"); ?>