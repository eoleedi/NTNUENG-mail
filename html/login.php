<?php
    include("lib/function.php");
    require_once "lib/config.php";

    // Initialize the session
    session_start();
    
    login();
   
    include("template/login.php");
?>