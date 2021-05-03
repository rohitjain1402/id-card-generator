<?php
include 'url.php';
session_start();
include 'config.php';
include 'user_auth.php';


if(!isLoggedIn()){
    header('Location:'.BASE_URL.'login.php');
    exit();
}

if(!$_SESSION['user']['role']['print_id_cards']){
    header('Location:'.BASE_URL.'login.php');
    exit();   
}

if(!isset($_GET['user_id'])){
	header('Location:'.BASE_URL.'admin.php');
    exit();
}

$sql = "SELECT * FROM employeedata WHERE user_id =".$_GET['user_id'];
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
if(!$data){
	header('Location:'.BASE_URL.'admin.php');
    exit();
}    
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" , content="width-device-width", initial-scale=1.0>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
    <title>Printing Page</title>
    <link rel="stylesheet" type="text/css" href="print.css">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <style>
        .view-container{
            /*display: none;*/
        }
    	
    </style>
</head>
<body>
    
 <div class="view-container" style="overflow-x:auto;">
 	<a href="admin.php"> <button class="btn btn-warning" type="submit">Home</button></input></a>
    <br><hr>
	<table id="employeedata">
	 <tr>
	  <th>User id</th>
	  <th>First name</th>
	  <th>Last name</th>
	  <th>Department</th>
	  <th>Designation(optional)</th>
	  <th>Emp ID</th>
	  <th>DOB</th>
	  <th>Mobile</th>
	  <th>Emergency number</th>
	  <th>Blood group</th>
	  <th>Date of issue</th>
	  <th>Date of expiry</th>
	  <th>Image</th>
	 </tr>
	 <?php if($data):?>
	 	<?php foreach($data as $user):?>
	 		<tr>
	 			<td><?= $user['user_id']; ?></td>
	 			<td><?= $user['Firstname']; ?></td>
	 			<td><?= $user['Lastname']; ?></td>
	 			<td><?= $user['Department']; ?></td>
	 			<td><?= $user['Designation']; ?></td>
	 			<td><?= $user['Emp_ID']; ?></td>
	 			<td><?= $user['DOB']; ?></td>
	 			<td><?= $user['Mobile']; ?></td>
	 			<td><?= $user['Emergency']; ?></td>
	 			<td><?= $user['Blood_group']; ?></td>
	 			<td><?= $user['Dateofissue']; ?></td>
	 			<td><?= $user['Dateofexpiry']; ?></td>
	 			<td><?= $user['Filename']; ?></td>
	 		</tr>
	 	<?php endforeach;?>
	 <?php endif;?>	
	</table>
 <div class="text-center">
 	<button class="btn btn-primary single-print-btn" id="print-btn">Print</button>
 </div>	 		

	
</div>
	
	<div class="id-card-view">
		<div class="id-card" style="position: relative;">
			<div class="front-page">
				<img class="front-page-img" src="img/card_sanmarg_P1.jpg" style="background-size:cover;">
				<div class="empimg">
					<img src="<?= $data[0]['Filename']?>">
				</div>
				<div class="name">
					<span>Name: </span><?= $data[0]['Firstname']?> <?= $data[0]['Lastname']?>
				</div>
				<div class="department">
					<span>Department: </span><?= $data[0]['Department']?>
				</div>
				<div class="designation">
					<span>Designation: </span><?= $data[0]['Designation']?>
				</div>
			</div>	
			<div class="back-page">
				<img class="back-page-img" src="img/card_sanmarg_P2.jpg">
				<div class="empid">
					<?= $data[0]['Emp_ID']?>
				</div>
				<div class="dob">
					<?= $data[0]['DOB']?>
				</div>
				<div class="mobile">
					<?= $data[0]['Mobile']?>
				</div>
				<div class="emergency">
					<?= $data[0]['Emergency']?>
				</div>
				<div class="bloodgroup">
					<?= $data[0]['Blood_group']?>
				</div>
				<div class="dateofissue">
					<?= $data[0]['Dateofissue']?>
				</div>
				<div class="dateofexpiry">
					<?= $data[0]['Dateofexpiry']?>
				</div>
				<div class="qrcode">
					<img src="<?= $data[0]['qr_file']?>">
				</div>	
			</div>

		</div>	
	</div>

			
			
			
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script type="text/javascript">
    	 console.dir(screen);
    	 let p;
    	 // $('.front-page .front-page-img').css({'width':screen.width+'px'})
        $('.single-print-btn').on('click',function(){
        	$('.front-page,.back-page').css({'display':'flex'})
        	
            // $('.front-page-img').css({'width':'80%'})
            // $('.back-page img').css({'width':'90%'})
            // $('.front-page div').css({'font-size':'30px'})
            // $('.front-page .empimg').css({'top':'365px'})
            // $('.front-page .empimg img').css({'width':'410px','height':'525'})
            // $('.front-page .name').css({'top':'900px'})
            // $('.front-page .department').css({'top':'950px'})
            // $('.front-page .designation').css({'top':'1000px'})
            // $('.front-page div').css({'display':'none'})
            $('.front-page .front-page-img').css({'height':'100%'})
             $('.back-page .back-page-img').css({'height':'100%'})
            

            let printInput = prompt('Do you Want to print? (type: yes to confirm)')
            if(printInput=="yes"||printInput=="Yes"||printInput=="YES"){

            	$('*').css({'margin':'0px','padding':'0px'});
            	$('.view-container').css({'display':'none'});
            	window.print();
			}           


        })
        window.addEventListener('afterprint',function(){
        	let base = location.origin
        	console.log(base)
        	$('*').css({'display':'none'})
        	console.log(window.location.assign('update_print.php?user_id='+<?= $data[0]['user_id']?>));
        })
    </script>
</body>
</html>