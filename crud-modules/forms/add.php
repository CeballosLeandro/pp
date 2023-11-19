<?php
include("../db.php");

if (isset($_POST['add'])){
    $name = $_POST['Nombre'];
    $esp = $_POST['Especialidad'];
    $location = $_POST['Ubicacion'];
    $sector = $_POST['Sector'];
    $posicion = $location . $sector;
    $desc = $_POST['Descripcion'];
    $history = $_POST['Historia'];
    $imagenDir = "assets/imgobject/";

    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
        $imagenPath = $imagenDir . basename($_FILES["imagen"]["name"]);

        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $imagenPath)) {
            // La imagen se cargó exitosamente, ahora puedes guardar la ruta en la base de datos
            $query = "INSERT INTO objeto(nombre, especialidad, posicion, descripcion, descripcionh, imagen) VALUES ('$name', '$esp', '$posicion', '$desc', '$history', '$imagenPath')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                // Obtén el ID del último objeto insertado
                $lastInsertedID = mysqli_insert_id($conn);

                // Obtén la fecha de ingreso asociada con el último objeto insertado
                $selectFechaQuery = "SELECT fechaIngreso FROM objeto WHERE id = $lastInsertedID";
                $resultFecha = mysqli_query($conn, $selectFechaQuery);
                
                if ($resultFecha && $rowFecha = mysqli_fetch_assoc($resultFecha)) {
                    $fechaIngreso = $rowFecha['fechaIngreso'];

                    // Inserta la información en la tabla historial
                    $insertHistorialQuery = "INSERT INTO historial (idobjeto, fechaAlta, fechaBaja, posicion, motivobaja, lugar) 
                                            VALUES ('$lastInsertedID', '$fechaIngreso', NULL, '$posicion', NULL, NULL)";
                    mysqli_query($conn, $insertHistorialQuery);

                    echo '
                     <script>
                          alert("Objeto Ingresado Correctamente!");
                          window.location = "editform.php";
                     </script>';
                } else {
                    echo "Error al obtener la fecha de ingreso.";
                }
            } else {
                die("Query Failed");
            }
        } else {
            echo "Error al mover el archivo.";
        }
    } else {
        echo "No se ha seleccionado un archivo o se ha producido un error en la carga.";
    }
}
?>