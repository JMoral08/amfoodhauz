<?php
include "../controller/register.php";

if(!empty($_POST)) {
	$action = $_POST['action'];
	switch ($action) {
		case "insert":
			$people = new People();
			$data = $people->insertData([
				'firstname' 		=> $_POST['firstname'],
				'lastname'  		=> $_POST['lastname'],
				'middlename' 		=> $_POST['middlename'],
				'birthdate' 		=> $_POST['birthdate'],
				'contactno' 		=> $_POST['contactno'],
				'email'		 		=> $_POST['email'],
				'address'   		=> $_POST['address'],
				'role' 				=> $_POST['role'],
				'status' 			=> $_POST['status']
			]);
			break;
		case "update":
			$people = new People();
			$data = $people->updateData([
				'id' 				=> $_POST['id'],
				'firstname' 		=> $_POST['firstname'],
				'lastname'  		=> $_POST['lastname'],
				'middlename' 		=> $_POST['middlename'],
				'birthdate' 		=> $_POST['birthdate'],
				'contactno' 		=> $_POST['contactno'],
				'email'		 		=> $_POST['email'],
				'address'   		=> $_POST['address'],
				'role' 				=> $_POST['role'],
				'status' 			=> $_POST['status']
			]);
			break;
		case "generate":
			$people = new People();
			$data = $people->generatetoUser([
				'id' 				=> $_POST['id']
			]);
			break;
		case "view":
			$people = new People();
			$data = $people->viewData();
			break;
		default:
			echo "null";
			break;
	}
}