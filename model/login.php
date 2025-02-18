<?php 
include "../controller/login.php";

if(!empty($_POST)) {
	$action = $_POST['action'];
	switch ($action) {
		case "login":
			$login = new Login();
			$data = $login->loginData([
				'username' 		=> $_POST['username'],
				'password' 		=> $_POST['password']
			]);
			break;
		
		default:
			echo "null";
			break;
	}
}