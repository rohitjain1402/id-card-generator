<?php
	
	include 'config.php';
	include 'url.php';
	print_r($_POST);

	$sql = "INSERT INTO restrictions(role_name,generate_qr_code,print_id_cards,edit_emp_data,delete_emp_data,add_emp_data,read_emp_data,search_data,import_from_excel) VALUES('".strtolower($_POST['role'])."','".$_POST['generate_qr_code']."','".$_POST['print_id_cards']."','".$_POST['edit_emp_data']."','".$_POST['delete_emp_data']."','".$_POST['add_emp_data']."','".$_POST['read_emp_data']."','".$_POST['search_data']."','".$_POST['import_from_excel']."')";

	if($db->query($sql)){
		header('Location:'.BASE_URL.'superadmin.php');
		exit();
	}
	header('Location:'.BASE_URL.'superadmin.php');
		exit();
?>