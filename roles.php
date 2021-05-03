<?php
	include_once 'config.php';

	function getRoleByName($name,$db){
		if($result = $db->query("SELECT * FROM restrictions WHERE role_name = '".$name."'")){
			if($result->num_rows>0){
				return $result->fetch_assoc();
			}
		}
		return false;

	}
?>