<?php
	include 'connection.php';

	if(isset($_POST['Submit'])){
		$user = $_POST['cust_name'];
		$email = $_POST['mail'];
		$bal = $_POST['curr_bal'];


		$insertquery = "INSERT INTO customers(Cust_Name,Email,Current_balance) values('$user','$email', '$bal')";

		$result = mysqli_query($conn,$insertquery);

		if($result)
			{
				header('usercreate.php');
			}else{

				die(mysqli_connect_error());

			}	
		


	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Money Transfer Portal</title>
	<link rel="stylesheet" type="text/css" href="Css/transfer.css">
</head>
<body>
	<header class="head-class">
		<nav class="head-nav">
			<a href="index.php">BACK</a>
		</nav>
		<h1>User Portal</h1>
	</header>
	<form action=" " method="POST">
		<div class="form-div">
			<caption><h4>Customer Name :</h4></caption>
			<input type="text" name="cust_name" class="required" placeholder="Customer Name">
			<caption><h4>Email Id :</h4></caption>
			<input type="email" name="mail" class="required" placeholder="ahds@gmail.com">
			<caption><h4>Account Balance :</h4></caption>
			<input type="number" name="curr_bal" class="required" placeholder="20000">
			<br><br>
			<input type="submit" name="Submit" value="Add User">
		</div>			
	</form>
</body>
</html>
