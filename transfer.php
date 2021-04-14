<?php
	include 'connection.php';

	if(isset($_POST['Transfer'])){
			$user = $_POST['fuser'];
			$userto = $_POST['Transfer_to'];
			$bal = $_POST['amount'];

			$currbal = "SELECT * from customers WHERE Cust_Name = '$user'";
			$sql = mysqli_query($conn,$currbal);
			$ret= mysqli_fetch_array($sql);

			$currbalance = "SELECT * FROM customers WHERE Cust_Name = '$userto'";
			$sql1 = mysqli_query($conn, $currbalance);
			$msql = mysqli_fetch_array($sql1);

			if($bal<0){
				?>
					<script type="text/javascript">
						alert("This type of Amount is not Considerarble.");
					</script>
				<?php
			}elseif ($bal==0) {
				# code...
				?>
					<script type="text/javascript">
						alert("Re-enter amount. Oops! Zero value cannot be transferred");
					</script>
				<?php
			}elseif ($bal>$ret['Current_balance']) {
				?>
					<script type="text/javascript">
						alert("Insufficient Balance.");
					</script>
				<?php
			}

			$date= date('Y-m-d');
			if($bal<$ret['Current_balance'] and $userto != null){

				$namew = $ret['Cust_Name'];
				$updateamount = $ret['Current_balance']-$bal;
				$Updatequery = "UPDATE customers SET  Current_balance=$updateamount WHERE Cust_Name='$user'";
				mysqli_query($conn,$Updatequery);


				$newamount = $msql['Current_balance']+$bal;
				$Updatetoquery = "UPDATE customers SET Current_balance=$newamount WHERE Cust_Name='$userto'";
				mysqli_query($conn,$Updatetoquery);

				$insertquery = "INSERT INTO transfers(Transfer_from, Transfer_to, Amount, tdate) VALUES('$namew','$userto','$bal','$date') ";
				$query = mysqli_query($conn,$insertquery);
				if($query)
				{
					?>
					<script type="text/javascript">
						alert("Data Inserted Properly.");
					</script>
				<?php
				}else{
					?>
					<script type="text/javascript">
						alert("Re-enter Data");
					</script>
				<?php
				}


				$updateamount = 0;
				$newamount = 0;
				$bal = 0;
			}
		}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Money Transfer Portal</title>
	<link rel="stylesheet" type="text/css" href="../BankAppmaster/Css/transfer.css">
</head>
<body>
	<header class="head-class">
		<nav class="head-nav">
			<a href="index.php">BACK</a>
		</nav>
		<h1>Payment Portal</h1>
	</header>
	<form action=" " method="POST">
	<div class="form-div">	
		<caption><h4>Transfer From :</h4></caption>
			 <select name="fuser" required>
    			<option disabled selected>-- Select Sender --</option>
    			<?php
        			
        			$selectQuery = "SELECT CONCAT(prefix,id) AS Cust_Id, Cust_Name, Email, Current_balance FROM customers";

					$query = mysqli_query($conn, $selectQuery);


        			while($result= mysqli_fetch_array($query))
					        {
					            echo "<option value='". $result['Cust_Name'] ."'>" .$result['Cust_Name'] ."</option>";  // displaying data in option menu
					        }	
					    ?>  
  			</select>
		<caption><h4>Transfer To :</h4></caption>
			<select name="Transfer_to" required>
    			<option disabled selected>-- Select Reciever --</option>
    			<?php
        			
        			$selectQuery = "SELECT CONCAT(prefix,id) AS Cust_Id, Cust_Name, Email, Current_balance FROM customers";

					$query = mysqli_query($conn, $selectQuery);


        			while($result= mysqli_fetch_array($query))
					        {
					            echo "<option value='". $result['Cust_Name'] ."'>" .$result['Cust_Name'] ."</option>";  // displaying data in option menu
					        }	
					    ?>  
  			</select>
		<caption><h4>Amount :</h4></caption>
			<input type="text" name="amount" required>
			<br><br>
		<input type="submit" name="Transfer" Value='Transfer'>
	</div>			
	</form>
</body>
</html>