<?php
include('lib/function.php');

$query = isset($_GET['query']) ? $_GET['query'] : false;
//print_r($query);
$error = false;

if ($query) {
   $goods = get_goods('', $query);
}   
else{
    $goods = get_goods();
}
include('template/index.php');
?>
