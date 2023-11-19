
<?php include('../includes/header.php') ?>

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
                    <div class="card-header">Registro</div>
                    <div class="card-body">
                        <form action="signup.php" method="POST">
                            <div class="form-group">
                                <label for="username">Nombre de Usuario</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="password" name="confirm_password" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" name="signup">Registrarse</button>
                        </form>
                        <div class="mt-3">
                            Ya tiene una cuenta? <a href="login.php" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Iniciar Sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('../includes/footer.php') ?>
