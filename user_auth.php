<?php

function isLoggedIn(){

	if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
		return true;
	}
	return false;
}

function isSuperAdminLoggedIn(){

	if(isset($_SESSION['superadmin'])&&!empty($_SESSION['superadmin'])){
		return true;
	}
	return false;
}


?>