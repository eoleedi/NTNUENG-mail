<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">	
	</head>
<body>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">日期: </th>
				<th scope="col">送貨單位/師大收發室:</th>
				<th scope="col">收件人:  </th>
				<th scope="col">簽收日期/時間: </th>

				<th scope="col">簽收人: </th>
				<th scope="col">郵件類別: </th>
				<th scope="col">放置日期/時間: </th>
				<th scope="col">放置地點: </th>
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

					<td><a href="mod.php?id=<?php echo htmlspecialchars($d['id']); ?>">Modify</a></td>
					<td><a href="del.php?id=<?php echo htmlspecialchars($d['id']); ?>" onclick="return confirm('Delete This?')">Delete</a></li>

				</tr>
			<?php } ?>
		</tbody>
	</table>
	<div class="d-flex justify-content-center">
		<button class="btn btn-primary" onclick="location.href='add.php'">Add News</button>
	</div>
</body>
</html>
