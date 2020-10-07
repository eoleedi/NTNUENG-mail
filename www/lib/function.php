<?php
include('config.php');

function add_good($cdate, $senderUnit, $receiver, $receiveDate, $receiveTime, $signer, $mailType, $mailNumber, $placementDate, $placementTime, $placementLocation)
{
	if ($cdate == '' || $senderUnit == '' || $receiver == '' || $receiveTime == '' || $signer == '' || $mailType == '' || $placementDate == '' ||$placementLocation == '') {
		return false;
	}

	$dbh = new PDO('mysql:host=mysql;dbname=' . DB_NAME, DB_USER, DB_PASS);
	$sql = 'INSERT INTO goods (cdate, senderUnit, receiver, receiveDateTime, signer, mailType, mailNumber, placementDateTime, placementLocation) VALUES(:cdate, :senderUnit, :receiver, :receiveDateTime, :signer, :mailType, :mailNumber, :placementDateTime, :placementLocation)';
	$stmt = $dbh->prepare($sql);

	$cdate = date('Y-m-d H:i:s');
	$receiveDateTime = date('Y-m-d H:i:s', strtotime($receiveDate . $receiveTime)); 
	$placementDateTime = date('Y-m-d H:i:s', strtotime($placementDate . $placementTime)); 
	$stmt->bindParam(':cdate', $cdate, PDO::PARAM_STR);
	$stmt->bindParam(':senderUnit', $senderUnit, PDO::PARAM_STR);
	$stmt->bindParam(':receiver', $receiver, PDO::PARAM_STR);
	$stmt->bindParam(':receiveDateTime', $receiveDateTime, PDO::PARAM_STR);
	$stmt->bindParam(':signer', $signer, PDO::PARAM_STR);
	$stmt->bindParam(':mailType', $mailType, PDO::PARAM_STR);
	$stmt->bindParam(':mailNumber', $mailNumber, PDO::PARAM_STR);
	$stmt->bindParam(':placementDateTime', $placementDateTime, PDO::PARAM_STR);
	$stmt->bindParam(':placementLocation', $placementLocation, PDO::PARAM_STR);

	
	return $stmt->execute();
	print_r($stmt->errorInfo());
	return true;
}

function get_goods($id = '')
{
	$dbh = new PDO('mysql:host=mysql;dbname=' . DB_NAME, DB_USER, DB_PASS);
	if ($id)
		$sql = 'SELECT * FROM goods WHERE id = :id';
	else
		$sql = 'SELECT * FROM goods ORDER BY receiveDateTime DESC';

	$stmt = $dbh->prepare($sql);

	if ($id)
		$stmt->execute(['id' => $id]);
	else
		$stmt->execute();

	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function mod_good($cdate, $senderUnit, $receiver, $receiveDate, $receiveTime, $signer, $mailType, $mailNumber, $placementDate, $placementTime, $placementLocation, $id)
{
	if ($cdate == '' || $senderUnit == '' || $receiver == '' || $receiveDate == '' || $receiveTime == '' || $signer == '' || $mailType == '' || $placementDate == '' || $placementTime == '' ||$placementLocation == '') {
		return false;
	}

	$dbh = new PDO('mysql:host=mysql;dbname=' . DB_NAME, DB_USER, DB_PASS);
	$sql = 'UPDATE goods SET cdate=:cdate, senderUnit=:senderUnit, receiver=:receiver, receiveDateTime=:receiveDateTime, signer=:signer, mailType=:mailType, mailNumber=:mailNumber, placementDateTime=:placementDateTime, placementLocation=:placementLocation WHERE id =:id ';
	$stmt = $dbh->prepare($sql);

	
	$cdate = date('Y-m-d H:i:s');
	$receiveDateTime = date('Y-m-d H:i:s', strtotime($receiveDate . $receiveTime)); 
	$placementDateTime = date('Y-m-d H:i:s', strtotime($placementDate . $placementTime)); 
	$stmt->bindParam(':id', $id, PDO::PARAM_STR);
	$stmt->bindParam(':cdate', $cdate, PDO::PARAM_STR);
	$stmt->bindParam(':senderUnit', $senderUnit, PDO::PARAM_STR);
	$stmt->bindParam(':receiver', $receiver, PDO::PARAM_STR);
	$stmt->bindParam(':receiveDateTime', $receiveDateTime, PDO::PARAM_STR);
	$stmt->bindParam(':signer', $signer, PDO::PARAM_STR);
	$stmt->bindParam(':mailType', $mailType, PDO::PARAM_STR);
	$stmt->bindParam(':mailNumber', $mailNumber, PDO::PARAM_STR);
	$stmt->bindParam(':placementDateTime', $placementDateTime, PDO::PARAM_STR);
	$stmt->bindParam(':placementLocation', $placementLocation, PDO::PARAM_STR);

	return $stmt->execute();
}

function del_good($id)
{
	if ($id == '') {
		return false;
	}

	$dbh = new PDO('mysql:host=mysql;dbname=' . DB_NAME, DB_USER, DB_PASS);
	$sql = 'DELETE FROM goods WHERE id = :id';
	$stmt = $dbh->prepare($sql);

	$stmt->bindParam(':id', $id, PDO::PARAM_INT);

	return $stmt->execute();
}
