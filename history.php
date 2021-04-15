<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="Css/history.css">
</head>
<body>
		<header class="head-class">
		<nav class="head-nav">
			<a href="index.php">BACK</a>
		</nav>
		<h1>Transfer History</h1>
		</header>
		<div class="divq">
			<table class="table-div">
				<thead class="tab-head">
					<tr class="tab-tr">
						<th>Id</th>
						<th>Transfer From</th>
						<th>Transfer To</th>
						<th>Amount</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody class="tab-body">
					<?php
						include 'connection.php';

						$selectQuery = "SELECT * FROM transfers";

						$query = mysqli_query($conn, $selectQuery);

						while($result= mysqli_fetch_array($query)){		
					?>
					<tr class="body-tr">
						<td><?php echo $result['Id']?></td>
						<td><?php echo $result['Transfer_from'];?></td>
						<td><?php echo $result['Transfer_to'];?></td>
						<td><?php echo $result['Amount'];?></td>
						<td><?php echo $result['tdate'];?></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
</body>
</html>
