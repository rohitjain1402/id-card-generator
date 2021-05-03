<?php
include 'url.php';
session_start();
include 'config.php';
$db = mysqli_select_db($connection,'idcard');


include 'user_auth.php';


if(!isLoggedIn()){
    header('Location:'.BASE_URL.'login.php');
    exit();
}

if(!$_SESSION['user']['role']['search_data']){
    header('Location:'.BASE_URL.'login.php');
    exit();   
}

if(isset($_POST['search'])){
    $user_id = $_POST['id'];
    $query = " SELECT  * FROM employeedata WHERE Emp_ID = '".$_POST['id']."'  ";
    
    $query_run = mysqli_query($connection,$query);

    $user=false;
    while ($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC))
    {
        $user=$row;       
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <!-- <meta name="viewport"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript" src="js/jquery.js"></script>
 <!-- <link rel="stylesheet" type="text/css" href="admin.css">-->
	<title>Search And Update Page</title>
</head>

<style>  
.dropbtn {  
    background-color: lightgrey;  
    color: black;  
    transition:1s;
    padding: 10px;  
    font-size: 18px;
    border:0px;  
}  
.dropdown {  
    display: inline-block;  
    position: relative  
}  
.dropdown-content {  
    position: absolute;  
    background-color: lightgrey;  
    min-width: 200px;  
    display: none;  
    z-index: 1;  
}  
.dropdown-content a {  
    color: black;  
    padding: 12px 16px;  
    text-decoration: none;  
    display: block;  
}  
.dropdown-content a:hover {  
    background-color: orange;  
}  
.dropdown:hover .dropdown-content {  
    display: block;  
}  
.dropdown:hover .dropbtn {  
    background-color: grey;  
}  
.sidebar {
  margin: 0;
  padding: 0;
  /*width: 200px;*/
  background-color: #f1f1f1;
  /*position: fixed;*/
  height: 100%;
  overflow: auto;
}
.sidebar a.active {
  background-color: black;
  color: white;}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}
 
#employeedata {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#employeedata th {
  border: 1px solid #ddd;
  padding: 8px;
}

#employeedata tr:nth-child(even){background-color: #f2f2f2;}

#employeedata tr:hover {background-color: #ddd;}

#employeedata th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
#employeedata td{
  /*margin: 10px;*/
  padding: 5px;
}

.navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial, Helvetica, sans-serif;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
/*.topbar{
  float: left;
  font-size: 16px;
  color: black;
  text-align: center;
  margin: 10px;
  padding: 20px;
  text-decoration: none;
}*/
.topbar ul{
  list-style-type: none;
}
.topbar li{
  display: inline-block;
}
.topbar li>a{
  transition:1s;
  padding:10px;
  text-decoration: none;
  color:gray;
}
.topbar li>a:hover{
  transition:1s;
  background-color:black;
  color:white;
}

.print-again-form{
  display: none;
  position: fixed;
  width: 100%;
  top:50%;
  background-color:lightgrey;
  padding: 20px;
}
.print-again-form *{
  margin: 20px;
}
</style>
</head>
<body>
  <div class="topbar">
    <ul>
      <li>
        <a href="admin.php">Home</a>     
      </li>
      <li>
        <a href="logout.php">Logout</a>
      </li>
      <li>
        <div class="dropdown">
          <button class="dropbtn">Menu </button>
          <div class="dropdown-content">
            <a href="addemployee.php">Add Employee</a>
            <a href="printall.php">Print All</a>
            <a href="bulk.php">Bulk Upload</a>
            <a href="gen_all_qrcodes.php">Generate all QRCodes</a>
            <a href="">View Employee</a>
          </div>
        </div> 
      </li>
    </ul>
  </div>
      <form class="print-again-form" method="post" action="print_again.php">
        <input type="hidden" name="user_id" value="<?= $user['user_id']?>">
        <input type="text" name="duplicate_reason" class="form-control col-12" placeholder="Duplicate Issue Reason">
        <input type="submit" class="btn btn-primary" name="PrintAgain" value="Print Again">
      </form>
    <form action="search.php" method="post">
    <input type="text" class="col-2 form-control" name="id" placeholder="search"/>
    <input type="submit" class="btn btn-primary" name="search" class="w3-btn w3-blue" value="Search Data"/>
    </form>
   <hr>
   <?php if($user):?>
   <div style="overflow-x:auto">

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
      <th>Printed</th>
      <th>Print_on_date</th>
      <th>Generate qrcode</th>
      <th>Print</th>
      <th>Edit</th>
      <th>Delete</th>
      <th>Image</th>
     </tr>
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
        <td><?php echo $user['printed']?"Printed":"Not Printed"; ?></td>
        <td><?= $user['print_on_date']; ?></td>
        
        <td><a href="qrgenerate1.php?user_id=<?= $user['user_id']?>">Generate qrcode</a></td>
        <td>
          <?php if((int)$user['printed']):?>
            <a class="btn btn-primary print-again-link">Print Again</a>
          <?php else:?>
              <a class="btn btn-primary" href="print.php?user_id=<?= $user['user_id']?>">Print</a>
          <?php endif;?>
        </td>

        <!-- <td><a class="btn btn-success" href="edit.php?User_id=<?= $user['user_id']?>">Edit</a></td> -->
        <!-- <td><a class="btn btn-danger" href="delete.php?user_id=<?=$user['user_id']?>">Delete</a></td> -->
        <td><a href="image.php?user_id=<?= $user['user_id']?>">Image</a></td>
        <td><img src="<?= $user['qr_file']?>"></td>
    </tr>
     
    </table>
   </div>
   <?php else:?>
    <div>
        Employee Not Found!
    </div>
    <?php endif;?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $('.print-again-link').on('click',function(){
        $('.print-again-form').css({'display':'block'})

      })
    </script>
</body>
</html>

