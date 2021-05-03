<?php
include 'config.php';
include 'url.php';
include 'roles.php';
session_start();


if(isset($_POST)&&!empty($_POST)){

	// if($_POST['username']!='admin@sanid.com' && $_POST['password']!='admin@san123')

        $sql = "SELECT * from user WHERE user_name = '".$_POST['User_name']."' AND  password = '".md5($_POST['Password'])."' "; 
        if($result = $db->query($sql))
        	{
        		
        	 if ($result->num_rows>0) {
                        $row = $result->fetch_assoc();
        		$_SESSION['user']['name']=$_POST['User_name'];
                        $_SESSION['user']['role']= getRoleByName($row['role'],$db);
                        // $_SESSION['user']['role']=$_POST['User_role'];
        	        header('Location:'.BASE_URL.'admin.php');
        	        exit();
        	     }


	        }
}

header('Location:'.BASE_URL.'login.php');
exit();
?>