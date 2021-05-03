<?php
$host = "localhost";
$user = "root";
$password = "ashokveena14";
$database = "idcard";

$db = new mysqli($host,$user,$password,$database);
if($db->connect_error){
	exit('connection failed');
}

// Database Variables (edit with your own server information)

$server = 'localhost';

$user = 'root';

$pass = 'ashokveena14';

$db1 = 'idcard';



// Connect to Database

$connection = mysqli_connect($server, $user, $pass,$db1);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$host="localhost"; 
$username="root"; 
$password="ashokveena14"; 
$db_name="idcard"; 
$tbl_name="employeedata";

// Connect to server and select database.
?>

