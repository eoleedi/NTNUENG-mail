<?php
include('lib/function.php');

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false  ){
	header("Location:login.php");
}


$id   = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$error = false;

if (del_good($id)) {
	header('Location: index.php');
	exit;
} else {
	$error = 'Input failed';
}
?>
