<?php
include 'url.php';
include 'config.php';
session_start();
error_reporting(0);
include 'user_auth.php';


if(!isLoggedIn()){
    header('Location:'.BASE_URL.'login.php');
    exit();
} 
?> 
<?php
   
  $result = mysqli_query($db, "SELECT * FROM employeedata"); 
?> 
  
<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <meta name="viewport" content="width=device-width , initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- <link rel="stylesheet" type= "text/css" href ="style.css"/>  -->
  <title>Image Upload</title> 
<style>
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
  color:black;
}
.topbar li>a:hover{
  transition:1s;
  background-color:red;
  color:black;
}
/*.content{*/
   overflow: hidden;
  /*background-color: #333;*/
  font-family: Arial, Helvetica, sans-serif;
  float: left;
  font-size: 15px;
  margin: 15px;
  color: white;
  text-align: left;
  padding: 18px 16px;
  text-decoration: none;
/*}*/
.container-fluid{
   overflow: hidden;
  /*background-color: #333;*/
  font-family: Arial, Helvetica, sans-serif;
  float: left;
  font-size: 15px;
  margin: 15px;
  color: black;
  text-align: left;
  padding: 18px 16px;
  text-decoration: none;
}
</style>
</head>
<body style="background-color: #f6f6f6">
   <div class="topbar">
    <ul>
      <li>
        <a href="admin.php"><button>Home</button></a>     
      </li>
      <li>
        <a href="logout.php"><button>Logout</button></a>
      </li>
    </ul>  
   </div> 
<div class="jumbotron"> 
  <div class="container-fluid">
  <form method="POST" action="upload_image.php" enctype="multipart/form-data"> 
      <input type="file" name="uploadfile" value=""/> 
       <input type="hidden" name="user_id" value="<?=$_GET['user_id']?>"> 
       <br><br>
       <div class="content">
          <button type="submit" name="upload">UPLOAD</button> 
       </div> 
  </form> 
</div> 
 </div>
<!-- </div>  -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
   
</body> 
</html> 