<?php
include("lib/function.php");
require_once "lib/config.php";

session_start();
$username = isset($_POST["username"]) ? trim($_POST["username"]) : false;
$password = isset($_POST["password"]) ? trim($_POST["password"]) : false;

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    }
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    }

    login($username, $password, $username_err, $password_err);
}
else{
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
        header("location:index.php");
    }
}

include("template/login.php");

?>