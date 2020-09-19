<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="utf-8">
	<title>Add goods</title>
	<link rel="stylesheet" href="../css/add.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script>
		function changeMailNumberName(){
			if($("#mailType").val() == "公文"){
				$("#mailNumberName").html("文號:");
				$("#mailNumber").show();
			}
			else if($("#mailType").val() == "平信"){
				$("#mailNumberName").html("");
				$("#mailNumber").hide();
			}
			else if($("#mailType").val() == "包裹" || $("#mailType").val() == "掛號信"){
				$("#mailNumberName").html("號碼:");
				$("#mailNumber").show();
			}
		}
	</script>
</head>
<body onLoad="changeMailNumberName()">
	<div>
		<?php
		if ($error) {
			echo '<h1>' . $error . '</h1>';
			echo $cdate, $senderUnit, $receiver, $receiveDate, $receiveTime, $signer, $mailType, $mailNumber, $placementDate, $placementTime, $placementLocation;
		}
		?>
	</div>
	<form method="post">
		<table class="table">
			<thead>
				<tr>
					<th>日期: </th>
					<th>送貨單位/師大收發室:</th>
					<th>收件人:  </th>
					<th>簽收日期/時間: </th>

					<th>簽收人: </th>
					<th>郵件類別: </th>
					<th>放置日期/時間: </th>
					<th>放置地點: </th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><input type="date" name="cdate" value="<?php echo htmlspecialchars($cdate); ?>"></td>
					<td><input type="text" name="senderUnit" width="50px" value="<?php echo htmlspecialchars($senderUnit); ?>"></td>
					<td><input type="text" name="receiver" value="<?php echo htmlspecialchars($receiver); ?>"></td>
					<td>
						<input type="date" name="receiveDate" value="<?php echo htmlspecialchars($receiveDate); ?>">
						<input type="time" name="receiveTime" value="<?php echo htmlspecialchars($receiveTime); ?>">
					</td>

					<td><input type="text" name="signer"value="<?php echo htmlspecialchars($signer); ?>"></td>
					<td>
						<select name="mailType" id="mailType" onchange="changeMailNumberName();">
							<option selected>平信</option>
							<option>公文</option>
							<option>包裹</option>
							<option>掛號信</option>
						</select>
						<br>
						<label id="mailNumberName"></label>
						<input type="text" name="mailNumber" id="mailNumber" style="display: none;" value="<?php echo htmlspecialchars($mailNumber); ?>">
					</td>
					<td>
						<input type="date" name="placementDate" value="<?php echo htmlspecialchars($placementDate); ?>">
						<input type="time" name="placementTime" value="<?php echo htmlspecialchars($placementTime); ?>">
					</td>
					<td><input type="text" name="placementLocation" value="<?php echo htmlspecialchars($placementLocation); ?>"></td>
				</tr>
			</tbody>
		</table>
		<div class="d-flex justify-content-center">
			<button class="btn btn-primary" name="post" value="submit" type="submit" >增加簽收物品</button>
		</div>
	</form>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  
</body>
</html>
