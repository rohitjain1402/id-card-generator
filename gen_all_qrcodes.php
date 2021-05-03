<?php
include 'url.php';
session_start();
include'config.php';
include 'user_auth.php';


if(!isLoggedIn()){
    header('Location:'.BASE_URL.'login.php');
    exit();
}
// if(isset($_POST("user_id")));

if(!$_SESSION['user']['role']['generate_qr_code']){
    header('Location:'.BASE_URL.'login.php');
    exit();   
}

include'phpqrcode/qrlib.php';


$sql = "SELECT * FROM employeedata";
$result = $db->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
	$data = array();
  while($row = $result->fetch_assoc()) {
    $data[]=$row;// data[i] = row
  }
}
foreach($data as $user){
	$qrdata ="Name: ".$user['Firstname']." ".$user['Lastname']." Address: ".$user['Address']." EMC: ".$user['Emergency']. " Secondary_no.: ".$data[0]['Secondary_no']."  EMP_ID: ".$data[0]['Emp_ID']."   Bloodgroup: ".$data[0]['Blood_group']." " ;  	
	$filename = "qrcodes/emp_".$user['Emp_ID'].".png";
	QRcode::png($qrdata,$filename);

	$query= ("UPDATE employeedata SET qr_file='".$filename."' WHERE user_id = ".$user['user_id']);
    $query_run = mysqli_query($connection,$query);
} 

header('Location:'.BASE_URL.'admin.php');
exit();
?>