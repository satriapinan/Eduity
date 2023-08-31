<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Member - Admin</title></head>
	</head>
	<body>
		<main style="padding: 100px 100px;">
			<h3>Member List</h3>
			<table border="1">
				<thead align="middle" valign="middle">
					<tr valign="middle">
						<th scope="col">No.</th>
						<th scope="col">Nama</th>
						<th scope="col">Username</th>
						<th scope="col">Email</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
					foreach ($user as $u) : ?>
					<tr valign="middle" align="middle">
						<td><?= $i ?></td>
						<td align="left"><?= $u['nama']; ?></td>
						<td><?= $u['username']; ?></td>
						<td><?= $u['email']; ?></td>
					</tr>
					<?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</main>
	</body>
</html>