<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">	
		<title>NTNUENG Mail</title>
		<link rel="stylesheet" href="./css/index.css">
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500&display=swap" rel="stylesheet">
	</head>
<body>	
	
	<?php include("nav.php"); ?>
	
	<br><br><br>
	<!-- search box -->
	<div class="mx-auto d-flex justify-content-center" style="width: 350px;">
		<form class="form-inline ">
			<div class="input-group " style="border-radius: 20px">
				<div class="input-group-prepend ">
					<span class="input-group-text">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
							<path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
						</svg>
					</span>		
				</div>
				<input class="form-control mr-sm-2" name="query" type="search" placeholder="Search" aria-label="Search">
				
			</div>
			<!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
		</form>
	</div>
	<br>
	<!-- data -->
	<div class="mx-auto " style="width: 90%">
		<?php if (count($goods) != 0){ ?>
		<div style="border-width:2px; border-style:solid; border-color:#EEEEEE; box-shadow: 3px 3px 2px rgba(0, 0, 0, 0.3);">
			<table class="table table-striped">
				<thead class="thead-dark">
					<tr>
						<th scope="col">日期</th>
						<th scope="col">送貨單位/師大收發室</th>
						<th scope="col">收件人</th>
						<th scope="col">簽收日期/時間</th>
						<th scope="col">簽收人</th>
						<th scope="col">郵件類別</th>
						<th scope="col">放置日期/時間</th>
						<th scope="col">放置地點</th>
						<th scope="col"></th>
						<th scope="col"></th>
					</tr>
				</thead>
				
				<tbody>
					<?php foreach ($goods as $d) { ?>
						<tr>
							<td><?php echo htmlspecialchars($d['cdate']); ?></td>
							<td><?php echo htmlspecialchars($d['senderUnit']); ?></td>
							<td><?php echo htmlspecialchars($d['receiver']); ?></td>
							<td><?php echo htmlspecialchars( date("Y-m-d H:i", strtotime($d['receiveDateTime'])) ); ?></td>

							<td><?php echo htmlspecialchars($d['signer']); ?></td>
							<td><?php echo htmlspecialchars($d['mailType']); ?></textarea><?php echo htmlspecialchars($d['mailNumber']); ?></td>
							<td><?php echo htmlspecialchars( date("Y-m-d H:i", strtotime($d['placementDateTime'])) ); ?></td>
							<td><?php echo htmlspecialchars($d['placementLocation']); ?></td>

							<td>
								<a href="mod.php?id=<?php echo htmlspecialchars($d['id']); ?>">
									<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
										<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
									</svg>
								</a>
							</td>
							<td>
								<a href="del.php?id=<?php echo htmlspecialchars($d['id']); ?>" onclick="return confirm('Delete This?')">
									<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
										<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
									</svg>
								</a>
							</td>
					

						</tr>
					<?php } ?>
				</tbody>
			</table>
			
			<br>
		</div>
		<?php }?>
		<div class="d-flex justify-content-center">
				<button class="btn btn-primary" onclick="location.href='add.php'">增加簽收物品</button>
		</div>
	</div>
	
</body>
</html>
