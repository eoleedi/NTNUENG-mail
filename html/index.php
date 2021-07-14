<?php
include 'lib/function.php';

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false) {
    header("Location:login.php");
}

$query = isset($_GET['query']) ? $_GET['query'] : false;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$id = isset($_GET['id']) ? $_GET['id'] : false;
$per = 10;

$error = false;

$result = get_goods($query, $page, $per);
$goods = $result[0];
$data_nums = $result[1];

$pages = ceil($data_nums / $per);

include 'template/index.php';
