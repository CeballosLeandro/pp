<?php
    session_start();
    unset($_SESSION['user_id']);
    session_destroy();
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: 0");
    header("Location: ../index.php");
    exit;
?>