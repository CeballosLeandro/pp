<?php
include('../crud-modules/db.php');

if (isset($_POST['signup'])) {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar si el correo ya está registrado
    $checkEmailQuery = "SELECT id FROM usuario WHERE mail = ?";
    $checkStmt = $conn->prepare($checkEmailQuery);
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        echo '
            <script>
                alert("Este correo ya está registrado");
                window.location = "registro.php";
            </script>
        ';
        exit;
    }

    // Verificar requisitos de contraseña
    if (strlen($password) < 4 || !preg_match("/[a-z]/i", $password) || !preg_match("/[0-9]/i", $password)) {
        echo '
            <script>
                alert("La contraseña debe tener al menos 4 caracteres, una letra y un número");
                window.location = "registro.php";
            </script>
        ';
        exit;
    }

    // Verificar si las contraseñas coinciden
    if ($_POST['password'] !== $_POST['confirm_password']) {
        echo '
            <script>
                alert("Las contraseñas no coinciden");
                window.location = "registro.php";
            </script>
        ';
        exit;
    }

    // Hash de la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insertar en la base de datos
    $sql = "INSERT INTO usuario (nombre, mail, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }

    $stmt->bind_param("sss", $user, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo '
            <script>
                alert("Registro exitoso. Ahora puedes iniciar sesión.");
                window.location = "login.php";
            </script>
        ';
        exit;
    } else {
        die("Error en la ejecución de la consulta: " . $stmt->error);
    }
}
?>