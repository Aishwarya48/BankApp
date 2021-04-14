<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../BankAppmaster/Css/style.css">

</head>
<body>

		<header>
		<h1>Welcome To Portal</h1>
		</header>
		<div class="divq">
			<nav>
				<a href="transfer.php"><h3>Payment Gateway </h3></a>
			</nav>
			<nav>
				<a href="usercreate.php"><h3>Create a Account |</h3></a>
			</nav>
			<nav>
				<a href="history.php"><h3>Transfer History |</h3></a>
			</nav>
		</div>
		<div class="table-div">
			<table class="tab-tab">
				<thead class="tab-head">
					<tr class="tab-tr">
						<th>Id</th>
						<th>Name of Holder</th>
						<th>Email</th>
						<th>Current Balance</th>
						<th>Opration</th>
					</tr>
				</thead>
				<tbody class="tab-body">
					<?php

						include 'connection.php';

						$selectQuery = "SELECT CONCAT(prefix,id) AS Cust_Id, Cust_Name, Email, Current_balance FROM customers";

						$query = mysqli_query($conn, $selectQuery);

						while($result= mysqli_fetch_array($query)){		
					?>
					<tr class="body-tr">
						<td><?php echo $result['Cust_Id']?></td>
						<td><?php echo $result['Cust_Name'];?></td>
						<td><?php echo $result['Email'];?></td>
						<td><?php echo $result['Current_balance'];?></td>
						<td><a href="transferto.php?name=<?php echo $result['Cust_Name']; ?>" data-toggle="tooltip" data-placement="top" title="Transfer"><i class= "fa fa-edit" aria-hidden = "True"></i></a></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
		<footer>
			<p>&copy 2021, <b>Spark Foundation Internship Project </b>Present by <b>Aishwarya Godse.</b></p>
		</footer>
</body>
</html>
