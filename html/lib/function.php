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
}
function get_good_by_id($id)
{
	$dbh = new PDO('mysql:host=mysql;dbname=' . DB_NAME, DB_USER, DB_PASS);
	
	$sql = "SELECT * FROM goods WHERE id = :id";
	$stmt = $dbh->prepare($sql);
	$stmt->execute(['id' => $id]);
	return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];

}
function get_goods($query, $page, $per)
{
	/* SQL note
		offset n row 			跳過n行
		fetch next n rows only  取得n行 
	*/ // wait for update 分頁功能

	$dbh = new PDO('mysql:host=mysql;dbname=' . DB_NAME, DB_USER, DB_PASS);

	$page = (int)$page;
	$start = ($page-1)*(int)$per;

	if($query){
		$query = '%'.$query.'%';
		$sql = "SELECT COUNT(*) FROM goods WHERE receiver LIKE :query OR senderUnit LIKE :query OR signer LIKE :query OR mailNumber LIKE :query";
	}
	else{
		$sql = "SELECT COUNT(*) FROM goods";
	}
	$stmt = $dbh->prepare($sql);

	if($query){
		$stmt->bindValue(':query', $query, PDO::PARAM_STR);
	}

	$stmt->execute();
	$data_nums = $stmt->fetchColumn();

	$stmt->closeCursor();



	if ($query){
		$query = '%'.$query.'%';
		$sql = "SELECT * FROM goods WHERE receiver LIKE :query OR senderUnit LIKE :query OR signer LIKE :query OR mailNumber LIKE :query ORDER BY receiveDateTime DESC LIMIT :dataStart,10";
	}
	else
		$sql = "SELECT * FROM goods ORDER BY receiveDateTime DESC LIMIT :dataStart, 10";

	
	$stmt = $dbh->prepare($sql);

	if ($query){
		$stmt->bindValue(':dataStart', $start, PDO::PARAM_INT);
		$stmt->bindValue(':query', $query, PDO::PARAM_STR);
		$stmt->execute();
	}
	else{
		$stmt->bindValue(':dataStart', $start, PDO::PARAM_INT);
		$stmt->execute();
	}
	
	return array($stmt->fetchAll(PDO::FETCH_ASSOC), $data_nums);
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
function login($username, $password, &$username_err, &$password_err){
	 
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: index.php");
        exit;
    }
        
	// Validate credentials
	if(empty($username_err) && empty($password_err)){
		// Prepare a select statement
		$dbh = new PDO('mysql:host=mysql;dbname=' . DB_NAME, DB_USER, DB_PASS);
		$sql = "SELECT id, username, hashed_password FROM userdata WHERE username = :username";
		$stmt = $dbh->prepare($sql);
		
		if($stmt){
			// Bind variables to the prepared statement as parameters
			$stmt->bindParam(':username', $username, PDO::PARAM_STR);
			if($stmt->execute()){
				//$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				if($stmt->rowCount() == 1){
					$stmt->bindColumn('id', $id);
					$stmt->bindColumn('username', $username);
					$stmt->bindColumn('hashed_password', $correct_hashed_password);
					$stmt->fetch(PDO::FETCH_ASSOC);

					
					if(password_verify($password, $correct_hashed_password)){
						// Password is correct, so start a new session
						session_start();
						
						// Store data in session variables
						$_SESSION["loggedin"] = true;
						$_SESSION["id"] = $id;
						$_SESSION["username"] = $username;                            
						
						// Redirect user to welcome page
						header("location: index.php");
					} else{
						// Display an error message if password is not valid
						$password_err = "The password you entered was not valid.";
					}
					
					
				}
				else{
					// Display an error message if username doesn't exist
					$username_err = "No account found with that username.";
				}
			}
			else{
				echo json_encode($stmt->errorInfo());
				echo "Oops! Something went wrong. Please try again later.";
			}
		}
	}
}