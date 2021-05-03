<?php
include 'url.php';
    session_start();
	include('config.php');
    include 'user_auth.php';

    if(!isLoggedIn()){
        header('Location:'.BASE_URL.'login.php');
        exit();
    }
	 

        // If upload button is clicked ... 
  if (isset($_POST['upload'])) { 
  
    $filename = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];     
    $folder = "emp_img/".$filename; 
 
          
        // Now let's move the uploaded image into the folder: image 
        if (move_uploaded_file($tempname, $folder))  { 
            $msg = "Image uploaded successfully"; 
            // Get all the submitted data from the form 
        	$sql = ("UPDATE employeedata SET Filename='".$folder."' WHERE user_id = ".$_POST['user_id']);
        	$db->query($sql);
            header("Location:".BASE_URL.'admin.php');
        }else{ 
            $msg = "Failed to upload image"; 
      } 
  } 
?>