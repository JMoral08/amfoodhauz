<?php 

include "../controller/profile.php";
if(!empty($_POST)) {
	$action = $_POST['action'];
	switch($action) {
		case "view":
			$profile  = new Profile();
			$data = $profile->viewProfile();
			break;
		case "change":
			$profile = new Profile();
			$data = $profile->changeProfile([
				'id' 			=> $_POST['id'],
				'username'		=> $_POST['username'],
				'password' 		=> $_POST['password'],
				'usertype' 		=> $_POST['usertype']
			]);
			break;
		default:
			echo "null";
			break;
	}
}
?>