<?php
include 'url.php';
session_start();
include 'user_auth.php';


if(!isLoggedIn()){
  header('Location:'.BASE_URL.'login.php');
  exit();
}

if(!$_SESSION['user']['role']['add_emp_data']){
    header('Location:'.BASE_URL.'login.php');
    exit();   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport", content="width-device-widht, initial-scale=1.0">
    <title>Employee registration form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="js/jquery.js"></script>
 <style>
 	form {border: 3px solid #f1f1f1; }
    input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
input[type=text], input[type=number], input[type=date] {
  width: 100%;
  padding: 15px 20px;
  margin: 4px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
input[type=submit]:hover {
  opacity: 0.8;
}
.container {
  padding: 16px;
}
</style>
</head>
<body>
  <a href="admin.php"><button type="submit">Home</button></a>
	<div class="container">
	<h1><b><i>Register Employee</i></b></h1></div>
	<div class="jumbotron">
	 <div class="container">
	  <form action="insert_employee.php" method="post">
	     <label for="firstname">First name</label>
	     <input type="text" name="firstname" placeholder="First name" required>
       <label for="lastname">Last name</label>
       <input type="text" name="lastname" placeholder="Last name" required>
       <label for="Address">Address</label>
       <input type="text" name="Address" placeholder="Address" required>
       <label for="department">Department</label>
       <input type="text" name="department" placeholder="Dept" required>
       <label for="designation">Designation</label>
       <input type="text" name="designation" placeholder="Desig">
       <label for="employeeid">Emp ID</label>
       <input type="number" name="employeeid" placeholder="Emp id" required>
       <label for="dateofbirth">DOB</label>
       <input class="dob" type="date" name="dateofbirth" placeholder="DOB" required>
       <label for="mobile">Mobile number</label>
       <input type="number" name="mobile" placeholder="Mobile" required>
       <label for="contactnumber">Emergency contact no.</label>
       <input type="number" name="contactnumber" placeholder="Emergency contact" required>
       <label for="contactnumber">Secondary no.</label>
       <input type="number" name="secondary_no" placeholder="Spouse/Sibling no." required>
       <label for="bloodgroup">Blood group</label>
       <input  type="text" name="bloodgroup" placeholder="Blood group">
       <label for="dateofissue">Date of issue</label>
       <input class ="date_of_issue" type="date" name="dateofissue" placeholder="Date of issue" readonly>
       <label for="dateofexpiry">Date of expiry</label>
       <input class="dateofexpiry" type="date" name="dateofexpiry" placeholder="Date of expiry" readonly>
       <label for="card_validity">Card Validity:</label><br>
       <input class="one-year" type="radio" name="card_validity" value="1">
       <label for="card_validity">1 year</label><br>
       <input class="five-years" type="radio" name="card_validity" value="5">
       <label for="card_validity">5 years</label><br>
       <input class="lifetime"  type="radio" name="card_validity" value="Age=58">
       <label for="card_validity">Age=58</label><br>
       <input type="submit" name="submit" value="Register">
      </form>
     </div>
    </div>  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript">
  
    let dob;
    let expiryDate;
    const DATEOFISSUE = new Date();
    $('.date_of_issue').val(DATEOFISSUE.getFullYear()+'-'+(parseInt(DATEOFISSUE.getMonth())+1)+'-'+DATEOFISSUE.getDate())
    $('.one-year').on('change', function(){
      dob=new Date($('.date_of_issue').val())
      expiryDate=new Date()
      expiryDate.setYear(dob.getFullYear()+1)
      $('.dateofexpiry').val(expiryDate.getFullYear()+'-'+(parseInt(expiryDate.getMonth())+1)+'-'+expiryDate.getDate())
      console.log('Expiry Date: '+expiryDate)
      
    })
    $('.five-years').on('change', function(){
      dob=new Date($('.date_of_issue').val())
      expiryDate=new Date()
      expiryDate.setYear(dob.getFullYear()+5)
      $('.dateofexpiry').val(expiryDate.getFullYear()+'-'+(parseInt(expiryDate.getMonth())+1)+'-'+expiryDate.getDate())
      console.log('Expiry Date: '+expiryDate)
      
    })
    $('.lifetime').on('change', function(){
      dob=new Date($('.dob').val())
      expiryDate=new Date()
      expiryDate.setYear(dob.getFullYear()+58)
      $('.dateofexpiry').val(expiryDate.getFullYear()+'-'+(parseInt(expiryDate.getMonth())+1)+'-'+expiryDate.getDate())
      console.log('Expiry Date: '+expiryDate)
      
    })

  </script>
</body>
</html>
