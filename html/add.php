<?php
include 'lib/function.php';

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false) {
    header("Location:login.php");
}

$post = isset($_POST['post']) ? $_POST['post'] : false;
$error = false;

$cdate = isset($_POST['cdate']) ? $_POST['cdate'] : '';
$senderUnit = isset($_POST['senderUnit']) ? $_POST['senderUnit'] : '';
$receiver = isset($_POST['receiver']) ? $_POST['receiver'] : '';
$receiveDate = isset($_POST['receiveDate']) ? $_POST['receiveDate'] : '';
$receiveTime = isset($_POST['receiveTime']) ? $_POST['receiveTime'] : '';
$signer = isset($_POST['signer']) ? $_POST['signer'] : '';
$mailType = isset($_POST['mailType']) ? $_POST['mailType'] : '';
$mailNumber = isset($_POST['mailNumber']) ? $_POST['mailNumber'] : '';
$placementDate = isset($_POST['placementDate']) ? $_POST['placementDate'] : '';
$placementTime = isset($_POST['placementTime']) ? $_POST['placementTime'] : '';
$placementLocation = isset($_POST['placementLocation']) ? $_POST['placementLocation'] : '';

if ($post) {
    if ($mailType == "平信") {
        $mailNumber = '';
    }

    if (add_good($cdate, $senderUnit, $receiver, $receiveDate, $receiveTime, $signer, $mailType, $mailNumber, $placementDate, $placementTime, $placementLocation)) {
        header('Location: /index.php');
        exit;
    } else {
        $error = 'Input failed';
    }
} else {
    $senderUnit = "收發室";
    $cdate = date("Y-m-d");
    $receiveDate = date("Y-m-d");
    $receiveTime = date("H:i");
    $placementDate = date("Y-m-d");
    $placementTime = date("H:i");
}

include 'template/add.php';