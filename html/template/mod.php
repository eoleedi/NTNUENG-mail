<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="utf-8">
	<title>Mod Goods</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-clockpicker.min.css">
	
	<script>
		function onload(){

			$("#mailType").val("<?php echo $mailType;?>");
			changeMailNumberName();
		}
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
<body onload="onload()">
	<div>
		
	</div>
	<?php include("nav.php"); ?> 
	
	<form method="post">
		<div class="mx-auto " style="width: 80%; padding: 20px;">
			<h3>修改簽收物品</h3>
			<div style="border-width:2px; border-style:solid; border-color:#EEEEEE; box-shadow: 3px 3px  rgba(0, 0, 0, 0.3);">
				<table class="table">
					<tbody>
						<tr>
							<th>日期: </th>
							<td><input type="date" name="cdate" value="<?php echo htmlspecialchars($cdate); ?>"></td>
						</tr>
						<tr>
							<th>送貨單位/師大收發室:</th>
							<td><input type="text" name="senderUnit" width="50px" value="<?php echo htmlspecialchars($senderUnit); ?>"></td>
						</tr>
						<tr>
							<th>收件人:  </th>
							<td>
								<!-- <input type="text" name="receiver" value="<?php echo htmlspecialchars($receiver); ?>">-->
								<input type="text" name="receiver" list="receiver" value="<?php echo htmlspecialchars($receiver); ?>"/>
								<datalist id="receiver">
									<option>英語系辦公室</option>
								</datalist>
							</td>
						</tr>	
						<tr>
							<th>簽收日期/時間: </th>
							<td>
								<div class="container">
									<div class="row">
										<input type="date" name="receiveDate" value="<?php echo htmlspecialchars($receiveDate); ?>">
										&nbsp
										<div class="input-group clockpicker" style="width: 30%;">
											<input type="text" name="receiveTime" class="form-control" value="<?php echo htmlspecialchars($receiveTime); ?>">
											<div class="input-group-append input-group-addon"> <!-- #input-group-addon: make the element clickable -->
												<span class="input-group-text">
													<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z"/>
														<path fill-rule="evenodd" d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
													</svg>
												</span>
											</div>
										</div>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>簽收人: </th>
							<td><input type="text" name="signer"value="<?php echo htmlspecialchars($signer); ?>"></td>
						</tr>
						<tr>
							<th>郵件類別: </th>
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
						</tr>
						<tr>
							<th>放置日期/時間: </th>
							<td>
								<div class="container">
									<div class="row">
										<input type="date" name="placementDate" value="<?php echo htmlspecialchars($placementDate); ?>">
										&nbsp
										<div class="input-group clockpicker" style="width: 30%;">
											<input type="text" name="placementTime" class="form-control" value="<?php echo htmlspecialchars($placementTime); ?>">
											<div class="input-group-append input-group-addon"> <!-- #input-group-addon: make the element clickable -->
												<span class="input-group-text">
													<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clock" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z"/>
														<path fill-rule="evenodd" d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
													</svg>
												</span>
											</div>
										</div>
									</div>
								</div>
							</td>
						<tr>
							<th>放置地點: </th>
							<td>
								<!-- <input type="text" name="placementLocation" value="<?php echo htmlspecialchars($placementLocation); ?>">-->
								<input type="text" name="placementLocation" list="placementLocation" value="<?php echo htmlspecialchars($placementLocation); ?>"/>
								<datalist id="placementLocation">
									<option>教師研究室</option>
									<option>走廊信箱區</option>
									<option>系辦公文登記桌</option>
								</datalist>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="d-flex justify-content-center" name="errorMsgBox">
					<?php
						if ($error) {
							echo $error;
							#echo $cdate, $senderUnit, $receiver, $receiveDate, $receiveTime, $signer, $mailType, $mailNumber, $placementDate, $placementTime, $placementLocation;
						}
					?>
				</div>
				<div class="d-flex justify-content-center">
					<input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
					<button class="btn btn-primary" name="post" value="submit" type="submit" >修改簽收物品</button>
				</div>
				<br>
			</div>
		</div>
	</form>

	

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/bootstrap-clockpicker.min.js"></script>
	<script type="text/javascript">
		$('.clockpicker').clockpicker();
	</script>
</body>
</html>
