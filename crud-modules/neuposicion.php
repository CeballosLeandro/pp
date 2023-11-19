<?php
include("db.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $id = $_GET['id'];

    // Obtener valores del formulario
    $nuevaUbicacion = mysqli_real_escape_string($conn, $_POST['ubicacion']);
    $nuevoSector = mysqli_real_escape_string($conn, $_POST['sector']);
    $nuevaPosicion = $nuevaUbicacion . $nuevoSector;

        // Actualizar la ubicación y el sector en la tabla objeto
        $queryUpdate = "UPDATE objeto SET posicion = '$nuevaPosicion', estado = 'Activo' WHERE id = $id";
        if (mysqli_query($conn, $queryUpdate)) {

            // Insertar en la tabla historial
            $insertHistorialQuery = "INSERT INTO historial (idobjeto, fechaAlta, fechaBaja, posicion, motivobaja, lugar) 
                                    VALUES ('$id', CURRENT_TIMESTAMP, NULL, '$nuevaPosicion', NULL, NULL)";
            mysqli_query($conn, $insertHistorialQuery);

            echo '
                <script>
                    alert("Objeto cambiado de posición correctamente!");
                    window.location = "forms/editform.php";
                </script>';
            exit;
        } else {
            // Manejar el caso donde la actualización falla
            echo "Error en la operación de actualización: " . mysqli_error($conn);
            // Puedes redirigir o manejar de otra manera
        }
    } else {
        echo '
            <script>
                alert("Error en la operación de actualización!");
                window.location = "forms/editform.php";
            </script>';
    }
?>