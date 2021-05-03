<?php
include 'url.php';
session_start();
include 'config.php';
include 'user_auth.php';


if(!isLoggedIn()){
    header('Location:'.BASE_URL.'login.php');
    exit();
}

$sql = "SELECT * FROM employeedata"	;
$result = $db->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
	$data = array();
  while($row = $result->fetch_assoc()) {
    $data[]=$row;// data[i] = row
  }
} 
else {
  $data = false;
}     
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="print.css">
	<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
	<div class="container">
		<?php foreach($data as $user):?>
			<div class="id-card-view">
				<div class="id-card" style="position: relative;">
					<div class="front-page">
						<img src="img/card_sanmarg_P1.jpg">
						<div class="empimg">
							<img src="<?= $user['Filename']?>">
						</div>
						<div class="name">
							<span>Name: </span><?= $user['Firstname']?> <?= $user['Lastname']?>
						</div>
						<div class="department">
							<span>Department: </span><?= $user['Department']?>
						</div>
						<div class="designation">
							<span>Designation: </span><?= $user['Designation']?>
						</div>
					</div>	
					<div class="back-page">
						<img src="img/card_sanmarg_P2.jpg">
						<div class="empid">
							<?= $user['Emp_ID']?>
						</div>
						<div class="dob">
							<?= $user['DOB']?>
						</div>
						<div class="mobile">
							<?= $user['Mobile']?>
						</div>
						<div class="emergency">
							<?= $user['Emergency']?>
						</div>
						<div class="bloodgroup">
							<?= $user['Blood_group']?>
						</div>
						<div class="dateofissue">
							<?= $user['Dateofissue']?>
						</div>
						<div class="dateofexpiry">
							<?= $user['Dateofexpiry']?>
						</div>
						<div class="qrcode">
							<img src="<?= $user['qr_file']?>">
						</div>	
					</div>

				</div>	
			</div>
		<?php endforeach;?>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			window.print()	
		});

		window.addEventListener('afterprint',function(){
        	let base = location.origin
        	console.log(base)
        	console.log(window.location.assign('update_print_all.php'));
        })
		
		
	</script>
</body>
</html>