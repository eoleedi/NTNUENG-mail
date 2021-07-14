<?php

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false) {
    header("Location:login.php");
}

unset($_SESSION["username"]);
unset($_SESSION["loggedin"]);
unset($_SESSION["id"]);
header("Location:login.php");
