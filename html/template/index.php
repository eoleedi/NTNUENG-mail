<!DOCTYPE html>
<html lang="zh-TW">

<head>
	<title>師大英語系郵物登記平台</title>
	<meta charset="UTF-8">
	<meta name="viewport" , content="width = device-width, initial-scale = 1.0">
	<link rel="icon" href="/src/favicon.png">

	<!-- CSS reference-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
		integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/index.css?v=2">
</head>

<body>
	<!-- Navbar -->
	<?php include("nav.php"); ?>

	<!-- Content -->
	<div class="container-fluid">

		<!-- Storage data -->
		<div class="mx-auto">
			<?php if (count($goods) != 0) { ?>
				<div class="storage-box">
					<table class="table table-striped table-responsive-xl">
						<thead>
							<tr class="thead-color">
								<th scope="col">日期</th>
								<th scope="col">送貨單位/<br>師大收發室</th>
								<th scope="col">收件人</th>
								<th scope="col">簽收日期/時間</th>
								<th scope="col">簽收人&nbsp</th>
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
									<td>
										<?php echo htmlspecialchars($d['cdate']); ?>
									</td>
									<td>
										<?php echo htmlspecialchars($d['senderUnit']); ?>
									</td>
									<td>
										<?php echo htmlspecialchars($d['receiver']); ?>
									</td>
									<td>
										<?php echo htmlspecialchars(date("Y-m-d H:i", strtotime($d['receiveDateTime']))); ?>
									</td>
									<td>
										<?php echo htmlspecialchars($d['signer']); ?>
									</td>
									<td>
										<?php echo htmlspecialchars($d['mailType']); ?></textarea><br>
										<?php echo htmlspecialchars($d['mailNumber']); ?>
									</td>
									<td>
										<?php echo htmlspecialchars(date("Y-m-d H:i", strtotime($d['placementDateTime']))); ?>
									</td>
									<td>
										<?php echo htmlspecialchars($d['placementLocation']); ?>
									</td>
									<td>
										<!-- Modify icon-->
										<a href="mod.php?id=<?php echo htmlspecialchars($d['id']); ?>">
											<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-pencil-square"
												fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path
													d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
												<path fill-rule="evenodd"
													d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
											</svg>
										</a>
									</td>
									<td>
										<!-- Delete icon -->
										<a href="del.php?id=<?php echo htmlspecialchars($d['id']); ?>"
											onclick="return confirm('Delete This?')">
											<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-trash"
												fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path
													d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
												<path fill-rule="evenodd"
													d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
											</svg>
										</a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<br>
				<div class="d-flex justify-content-center">
					<?php
					for ($i = 1; $i <= $pages; $i++) {
						if ($page - 3 < $i && $i < $page + 3) {
							if ($i != $page) {
								if ($query) {
									echo "<a class=\"page-nav\" href=?page=" . $i . "&query=" . $query . ">" . $i . "</a>&nbsp";
								} else {
									echo "<a class=\"page-nav\" href=?page=" . $i . ">" . $i . "</a>&nbsp";
								}
							} else {
								echo $i . "&nbsp";
							}
						}
					}
					?>
					<a class="page-nav" href=<?php echo "?page=" . $pages; ?>> 末頁</a>
				</div>
			<?php } else { ?>
				<div class="d-flex justify-content-center">
					<text>沒有資料喔</text>
				</div>
				<div class="d-flex justify-content-center">
					<a href="./"> (回首頁) </a>
				</div>
			<?php } ?>
		</div>
	</div>
</body>

</html>