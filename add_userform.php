<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"  content="width-device-width  initia-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<title>Add User</title>
</head>
<body>
      	<form action="adduser.php" method="post">
	<div class="">
		<div class="row">
			<div class="col-1">
				<label>User name:</label>	
			</div>
			<div class="col-3">
				<input class="form-control" type="text"  name="username">
			</div>
			<div class="col-1">
				<label>Password:</label>	
			</div>
			<div class="col-3">
				<input class="form-control" type="password"  name="password">
			</div>
		</div><br>
		<div class="row">
			<div class="col-1">
				<label>Role name:</label>	
			</div>
			<div class="col-3">
				<label for="admin">Admin</label>
				<input class="" type="radio"  name="rolename" value="admin"><br>
				<label for="hr">HR</label>
				<input class="" type="radio"  name="rolename" value="hr" checked=""><br>
				<label for="normal">Normal User</label>
				<input class="" type="radio"  name="rolename" value="normal">
			</div>
		</div>
		
	</div>
    <input class="btn btn-success" type="submit" name="adduser" value="Add"></input>
    </form>


















    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>	