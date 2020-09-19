<?php
include('lib/function.php');

$id   = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$error = false;

if (del_good($id)) {
	header('Location: /index.php');
	exit;
} else {
	$error = 'Input failed';
}
?>
