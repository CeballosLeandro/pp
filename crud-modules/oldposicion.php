<?php
include("db.php");
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para obtener la posición desde la tabla objeto
    $posicionQuery = "SELECT posicion FROM objeto WHERE id = $id";
    $posicionResult = mysqli_query($conn, $posicionQuery);

    if ($posicionResult) {
        // Obtener el resultado de la consulta
        $posicionRow = mysqli_fetch_assoc($posicionResult);

        // Asegurarse de que se haya obtenido la posición
        if ($posicionRow && isset($posicionRow['posicion'])) {
            $pos = $posicionRow['posicion'];

            // Realizar el INSERT en la tabla historial
            $insertHistorialQuery = "INSERT INTO historial (idobjeto, fechaAlta, fechaBaja, posicion, motivobaja, lugar) 
                                    VALUES ('$id', CURRENT_TIMESTAMP, NULL, '$pos', NULL, NULL)";
            mysqli_query($conn, $insertHistorialQuery);

            // Realizar el UPDATE en la tabla objeto para cambiar el estado
            $updateObjetoQuery = "UPDATE objeto SET estado = 'Activo' WHERE id = $id";
            mysqli_query($conn, $updateObjetoQuery);

            echo '
                <script>
                    alert("Objeto dado de alta correctamente");
                    window.location = "forms/editform.php";
                </script>';
        } else {
            // La posición no fue obtenida correctamente
            echo '
                <script>
                    alert("Error al obtener la posición desde la tabla objeto");
                    window.location = "forms/editform.php";
                </script>';
        }
    } else {
        // Error al obtener la posición desde la tabla objeto
        echo '
            <script>
                alert("Error al obtener la posición desde la tabla objeto");
                window.location = "forms/editform.php";
            </script>';
    }
} else {
    // No se proporcionó el ID de objeto
    echo '
        <script>
            alert("ID de objeto no proporcionado");
            window.location = "forms/editform.php";
        </script>';
}
?>