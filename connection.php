<?php
$db = 'testbank';
$username = 'root';
$password = '';
$server = 'localhost';

$conn = mysqli_connect($server,$username,$password,$db);

if ($conn) {
	
}else{
	die(mysqli_connect_error());
}


?>