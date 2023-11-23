<?php 
include("../crud-modules/db.php");

// Obtener el token de la URL
$tokenFromURL = mysqli_real_escape_string($conn, $_GET['token']);

// Verificar si el token es válido y aún no ha expirado (implementa esta lógica según tus necesidades)
$query = "SELECT * FROM tokens WHERE token = '$tokenFromURL' AND created_at > DATE_SUB(NOW(), INTERVAL 1 HOUR)";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Obtener el ID del usuario asociado al token (asumo que tienes una columna 'user_id' en tu tabla de tokens)
    $row = $result->fetch_assoc();
    $user_id = $row['user_id'];

    // Mostrar un prompt para ingresar el token
    echo '<script>
            var tokenInput = prompt("Ingresa el token:");
            if (tokenInput !== null && tokenInput === "' . $tokenFromURL . '") {
                // Si el usuario ingresó un token válido, enviarlo junto con el formulario de cambio de contraseña
                var form = document.createElement("form");
                form.method = "POST";
                form.action = "cambiar_contrasena.php";

                var tokenField = document.createElement("input");
                tokenField.type = "hidden";
                tokenField.name = "token";
                tokenField.value = "' . $tokenFromURL . '";
                form.appendChild(tokenField);

                var userIdField = document.createElement("input");
                userIdField.type = "hidden";
                userIdField.name = "user_id";
                userIdField.value = "' . $user_id . '";
                form.appendChild(userIdField);

                var tokenInputField = document.createElement("input");
                tokenInputField.type = "hidden";
                tokenInputField.name = "token_input";
                tokenInputField.value = tokenInput;
                form.appendChild(tokenInputField);

                document.body.appendChild(form);
                form.submit();
            } else {
                // Si el usuario cancela o el token no coincide, redirigir a la página de login
                alert("El token no es válido o ha expirado.");
                window.location.href = "login.php";
            }
        </script>';
} else {
    // Token no válido o ha expirado, redirigir a recovery.php
    echo "<script>alert('El token no es válido o ha expirado.'); window.location.href = 'recovery.php';</script>";
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
    <br>

    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">Recuperar Contraseña</div>
                    <div class="card-body">
                    <form method="POST" action="cambiar_contrasena.php">
                        <div class="form-group">
                            <label for="new_password">Nueva Contraseña:</label>
                            <input type="password" class="form-control" name="new_password" required>
                        </div>
                        <!-- Agregar campos ocultos para el token y el user_id -->
                        <input type="hidden" name="token" value="<?php echo htmlspecialchars($tokenFromForm); ?>">
                        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
                        <br>
                        <button type="submit" class="btn btn-primary" name="submit">Guardar Contraseña</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('../includes/footer.php') ?>
