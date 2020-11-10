<?php
include('lib/function.php');

$post = isset($_POST['post']) ? $_POST['post'] : false;
$error = false;


if ($post) {
	$cdate   			= isset($_POST['cdate']) ? $_POST['cdate'] : '';
	$senderUnit   		= isset($_POST['senderUnit']) ? $_POST['senderUnit'] : '';
	$receiver   		= isset($_POST['receiver']) ? $_POST['receiver'] : '';
	$receiveDate   		= isset($_POST['receiveDate']) ? $_POST['receiveDate'] : '';
	$receiveTime   		= isset($_POST['receiveTime']) ? $_POST['receiveTime'] : '';
	$signer   			= isset($_POST['signer']) ? $_POST['signer'] : '';
	$mailType   		= isset($_POST['mailType']) ? $_POST['mailType'] : '';
	$mailNumber 		= isset($_POST['mailNumber']) ? $_POST['mailNumber'] : '';
	$placementDate  	= isset($_POST['placementDate']) ? $_POST['placementDate'] : '';
	$placementTime  	= isset($_POST['placementTime']) ? $_POST['placementTime'] : '';
	$placementLocation  = isset($_POST['placementLocation']) ? $_POST['placementLocation'] : '';
	$id 				= isset($_POST['id']) ? $_POST['id'] : ''; 

	if($mailType == "平信"){
		$mailNumber = '';
	}

	if (mod_good($cdate, $senderUnit, $receiver, $receiveDate, $receiveTime, $signer, $mailType, $mailNumber, $placementDate, $placementTime, $placementLocation, $id)) {
		header('Location: /index.php');
		exit;
	} else {
		$error = 'Input failed';
	}
}
else{
	$senderUnit = "收發室";
	$good = get_goods($_GET['id'],'','')[0];
	
	$id 				= $_GET['id'];
	$cdate   			= $good['cdate'];
	$senderUnit   		= $good['senderUnit'];
	$receiver   		= $good['receiver'];
	$receiveDate   		= date("Y-m-d", strtotime($good['receiveDateTime']));
	$receiveTime   		= date("H:i", strtotime($good['receiveDateTime']));
	$signer   			= $good['signer']; 
	$mailType   		= $good['mailType']; 
	$mailNumber 		= $good['mailNumber'];
	$placementDate  	= date("Y-m-d", strtotime($good['placementDateTime'])); 
	$placementTime  	= date("H:i", strtotime($good['placementDateTime']));
	$placementLocation  = $good['placementLocation'];
	
}

include('template/mod.php');
?>
