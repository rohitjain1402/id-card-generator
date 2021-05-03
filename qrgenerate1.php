<?php
include 'url.php';
session_start();
include'config.php';
include 'user_auth.php';


if(!isLoggedIn()){
    header('Location:'.BASE_URl.'login.php');
    exit();
}
// if(isset($_POST("user_id")));

if(!$_SESSION['user']['role']['generate_qr_code']){
    header('Location:'.BASE_URL.'login.php');
    exit();   
}

include'phpqrcode/qrlib.php';


$sql = "SELECT * FROM employeedata WHERE user_id=".$_GET['user_id'];
$result = $db->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
	$data = array();
  while($row = $result->fetch_assoc()) {
    $data[]=$row;// data[i] = row
  }
} 
$qrdata ="Name: ".$data[0]['Firstname']." Address: ".$data[0]['Address']." EMC: ".$data[0]['Emergency']."  Secondary_no.: ".$data[0]['Secondary_no']."  EMP_ID: ".$data[0]['Emp_ID']."   Bloodgroup: ".$data[0]['Blood_group']." " ; 
$filename = "qrcodes/emp_".$data[0]['Emp_ID'].".png";
QRcode::png($qrdata,$filename);


	

    $query= ("UPDATE employeedata SET qr_file='".$filename."' WHERE user_id = ".$_GET['user_id']);
    echo $query;
    $query_run = mysqli_query($connection,$query);

    if($query_run){
    	echo'<script type="text/javascript"> alert("Data updated")</script>';
      header("Location:".BASE_URL."admin.php");
      exit();
    }
    else{
    	echo'<script type="text/javascript"> alert("Data not updated")</script>';
      header("Location:".BASE_URL."admin.php");
      exit();
    }
    
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
</head>
<body><br><hr>
<a href="admin.php"> <button type="submit">Home</button></input></a>
</body>
</html>
