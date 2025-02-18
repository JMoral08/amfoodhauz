<?php 
include "../controller/user.php";

if(!empty($_POST)) {
	$action = $_POST['action'];
	switch ($action) {
		case "user":
			$user = new User();
			$data = $user->viewUser();
			break;
		case "remove":
			$user = new User();
			$data = $user->removeUser([
				'id' 		=> $_POST['id'],
			]);
			break;
		default:
			echo "null";
			break;
	}
}