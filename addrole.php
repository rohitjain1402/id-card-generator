<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport", content="width-device-width , initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="admin.css">
  	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Welcome to Admin panel</title>
	<style>

</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row super-admin-navbar">
			<a class="btn btn-primary" href="">Add Role</a>
			<a class="btn btn-primary" href="">Add User</a>
			<a class="btn btn-primary" href="">Show Activity Logs</a>
			<a class="btn btn-primary" href="">Show Users</a>
			<a class="btn btn-primary" href="">Show Roles</a>
			<a class="btn btn-warning" href="">Log Out</a>
		</div>
	</div>
	<form class="" action="do_add_role.php" method="post">
		<div class="row">
			<div class="col-2">
				<label for="">Role Name:</label>
			</div>
			<div class="col-2">
				<input class="form-control" type="text" placeholder="Role Name" required name="role">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-2">
				<h3>Access</h3>	
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-2">
				<label for="">Generate QR Code:</label>
			</div>
			<div class="col-2">
				<input type="radio" name="generate_qr_code" value="1" checked> On
				<input type="radio" name="generate_qr_code" value="0"> Off
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-2">
				<label for="">Print ID Cards:</label>
			</div>
			<div class="col-2">
				<input type="radio" name="print_id_cards" value="1" checked> On
				<input type="radio" name="print_id_cards" value="0"> Off
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-2">
				<label for="">Edit Employee Data:</label>
			</div>
			<div class="col-2">
				<input type="radio" name="edit_emp_data" value="1" checked> On
				<input type="radio" name="edit_emp_data" value="0"> Off
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-2">
				<label for="">Delete Employee Data:</label>
			</div>
			<div class="col-2">
				<input type="radio" name="delete_emp_data" value="1" checked> On
				<input type="radio" name="delete_emp_data" value="0"> Off
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-2">
				<label for="">Add Employee Data:</label>
			</div>
			<div class="col-2">
				<input type="radio" name="add_emp_data" value="1" checked> On
				<input type="radio" name="add_emp_data" value="0"> Off
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-2">
				<label for="">Read Employee Data:</label>
			</div>
			<div class="col-2">
				<input type="radio" name="read_emp_data" value="1" checked> On
				<input type="radio" name="read_emp_data" value="0"> Off
			</div>
		</div>
		<div class="row">
			<div class="col-2">
				<label for="">Search Data:</label>
			</div>
			<div class="col-2">
				<input type="radio" name="search_data" value="1"> On
				<input type="radio" name="search_data" value="0" checked> Off
			</div>
		</div>
		<div class="row">
			<div class="col-2">
				<label for="">Import From Excel:</label>
			</div>
			<div class="col-2">
				<input type="radio" name="import_from_excel" value="1"> On
				<input type="radio" name="import_from_excel" value="0" checked> Off
			</div>
		</div>
		<input class="btn btn-primary" type="submit" value="Add">
	</form>
</body>
</html>