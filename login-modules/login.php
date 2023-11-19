<?php
   $is_invalid = false;

   if ($_SERVER["REQUEST_METHOD"] === "POST") {
       $mysqli = require __DIR__ . "../../crud-modules/db.php";
       $sql = sprintf("SELECT * FROM usuario WHERE mail = '%s'", $mysqli->real_escape_string($_POST['email']));
       $result = $mysqli->query($sql);
       $user = $result->fetch_assoc();
   
       if ($user && $_POST['password'] === $user['password']) {
           // Passwords match, so start the session and set user information
           session_start();
           session_regenerate_id();
           $_SESSION['user_id'] = $user['id'];
   
        //    Esto lo puse porque no funcaba desde el header normal, por ende use una posicion absoluta
        //    $url = "http://localhost/pp_crud/crud-modules/dashboard.php";
        //    header("Location: " . $url);
            header("Location: ../crud-modules/dashboard.php");
           exit;
       } else {
           // Passwords do not match, or user not found
           echo '
                <script>
                    alert("Datos Inválidos. Verifica tu correo y contraseña.");
                    window.location = "login.php";
                </script>    
           ';
           exit;
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
                    <div class="card-header">Iniciar Sesion</div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="email">Correo</label>
                                <input type="text" class="form-control" id="email" name="email"
                                value="<?= htmlspecialchars($_POST['email'] ?? "") ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" name="login_action">Siguiente</button>
                        </form>
                        <div class="mt-3">
                            No tiene cuenta?<a href="registro.php" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"> Registrarse</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include('../includes/footer.php') ?>