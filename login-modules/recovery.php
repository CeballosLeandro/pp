<?php
include("../crud-modules/db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['recuperar_contrasena_action']);
    $query = "SELECT * FROM usuario WHERE mail = '$email'";
    $result = $conn->query($query);

    if (!$result) {
        // Manejar errores de la consulta
        echo "Error en la consulta: " . $conn->error;
        exit; // Otra acción, dependiendo de tu lógica
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_user = $row["id"];
        $token = bin2hex(random_bytes(32));

        // Guardar el token en la base de datos (en la tabla 'tokens' que creaste)
        $insertQuery = "INSERT INTO tokens (user_id, token, created_at) VALUES ('$id_user', '$token', CURRENT_TIMESTAMP)";

        if ($conn->query($insertQuery) === TRUE) {
            // Mostrar el token en una alerta
            echo "<script>
                    alert('Tu token de recuperación es: $token'); 
                    window.location.href = 'verificartoken.php?token=$token';
                </script>";
        } else {
            // Manejar errores de la base de datos
            echo "Error inesperado";
        }
    } else {
        echo "<script>
                    alert('Correo inválido!'); 
                    window.location.href = 'recovery.php';
            </script>";
    }
}
?>

<?php include('../includes/header.php')?>

<style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background-image: url('../crud-modules/forms/assets/Otto.jpg'); /* Ruta a tu imagen de fondo */
            background-size: cover;
            background-position: center;
        }


</style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">Recuperar Contraseña</div>
                    <div class="card-body">
                    <form method="POST" action="recovery.php">
                        <div class="form-group">
                            <label for="correo">Ingrese Correo</label>
                            <input type="mail" class="form-control" name="recuperar_contrasena_action" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" name="submit">Enviar Autentificación</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include('../includes/footer.php') ?>