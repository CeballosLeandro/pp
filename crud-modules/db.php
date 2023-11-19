<?php
// session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'museo'
);

if($conn->connect_errno) {
    die("Connection error: " . $conn->connect_error);
}

return $conn;

?>