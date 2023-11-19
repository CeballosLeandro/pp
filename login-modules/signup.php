<?php 
    include('../crud-modules/db.php');

    if(isset($_POST['signup'])){
        $user = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(strlen($_POST['password']) < 4){
            // die("La contraseña debe tener 8 caracteres como mínimo");
            echo'
                <script>
                    alert("La contraseña debe tener 4 caracteres como mínimo");
                    window.location = "registro.php"
                </script>
            ';
        }
        if( ! preg_match("/[a-z]/i", $_POST["password"])){
            die("La contraseña debe contener al menos una letra");
        }
        if( ! preg_match("/[0-9]/i", $_POST["password"])){
            die("La contraseña debe contener al menos un número");
        }
        if($_POST['password'] !== $_POST['confirm_password']){
            die("Las contraseñas deben coincidir");
        }

    $sql = "INSERT INTO usuario (nombre,mail,password) VALUES (?,?,?)";
    $stmt = $conn->stmt_init();
    if( ! $stmt->prepare($sql)){
        die("SQL Error: " . $conn->error);
    }
    $stmt->bind_param("sss",
                       $_POST['username'],
                       $_POST['email'],
                       $_POST['password']);

    if($stmt->execute()){
        header("Location: login.php");
        exit;
    } else {
        if($conn->errno === 1062) {
            die("Mail ya registrado");
        }
        die($conn->error . " " . $conn->errno);
    }
}
 

?>