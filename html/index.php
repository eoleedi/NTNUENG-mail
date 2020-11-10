<?php
include('lib/function.php');

$query = isset($_GET['query']) ? $_GET['query'] : false;
$dataStart = isset($_GET['dataStart']) ? intval($_GET['dataStart']) : 0;
$id = isset($_GET['id']) ? $_GET['id'] : false;

//print_r($query);
$error = false;

if ($query) {
   $goods = get_goods($id, $query, $dataStart);
}   
else{
    $goods = get_goods($id, $query, $dataStart);
}
include('template/index.php');
?>
