<?php

// session_start();

// unset($_SESSION["uid"]);

// unset($_SESSION["name"]);

// header("location:index.php");

    session_start();
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
?>