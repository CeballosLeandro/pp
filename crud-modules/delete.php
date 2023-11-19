<?php
include("db.php");

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $motivoBaja = mysqli_real_escape_string($conn, $_POST['motivoBaja']);
    $lugar = mysqli_real_escape_string($conn, $_POST['lugar']);

    echo $id;

    // Obtén la información del objeto antes de realizar la baja
    $query = "SELECT posicion FROM objeto WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $posicion = $row['posicion'];

        // Actualizar la fila en la tabla historial
        $updateQuery = "UPDATE historial SET fechaBaja = CURRENT_TIMESTAMP, motivobaja = '$motivoBaja', lugar = '$lugar' WHERE idobjeto = $id AND fechaBaja IS NULL";
        $resultUpdate = mysqli_query($conn, $updateQuery);
        if (!$resultUpdate) {
            die("Error en la consulta: " . mysqli_error($conn));
        }
        

        // Actualizar la fila en la tabla objeto
        $updateObjetoQuery = "UPDATE objeto SET estado = 'Inactivo' WHERE id = $id";
        mysqli_query($conn, $updateObjetoQuery);

        echo '
            <script>
                alert("Objeto dado de baja correctamente!");
                window.location = "forms/editform.php";
            </script>';
    } else {
        echo '
            <script>
                alert("Error al obtener la información del objeto");
                window.location = "forms/editform.php";
            </script>';
    }
}
?>