<?php
include("../crud-modules/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Obtener el token y el user_id del formulario de verificartoken.php
    $tokenFromForm = mysqli_real_escape_string($conn, $_POST['token']);
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

    // Obtener la nueva contraseña del formulario
    $newPassword = mysqli_real_escape_string($conn, $_POST['new_password']);

    // Hashear la nueva contraseña antes de almacenarla
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Actualizar la contraseña hasheada en la tabla usuario
    $updateQuery = "UPDATE usuario SET password = '$hashedPassword' WHERE id = '$user_id'";
    if ($conn->query($updateQuery) === TRUE) {
        // Borrar el token utilizado
        $deleteQuery = "DELETE FROM tokens WHERE token = '$tokenFromForm' AND user_id = '$user_id'";
        $conn->query($deleteQuery);

        // Redireccionar a login.php con el mensaje
        echo "<script>
            alert('La contraseña ha sido cambiada correctamente!');
            window.location.href = 'login.php';
        </script>";
    } else {
        // Manejar errores de la base de datos al actualizar la contraseña
        echo "Error al cambiar la contraseña: " . $conn->error;
    }
}
?>