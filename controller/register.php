<?php

class People 
{
	public function insertData() {
		include "../config/connection.php";
		$firstname 			= $_POST['firstname'];
		$lastname 			= $_POST['lastname'];
		$middlename 		= $_POST['middlename'];
		$birthdate 			= $_POST['birthdate'];
		$contactno 			= $_POST['contactno'];
		$email 				= $_POST['email'];
		$address 			= $_POST['address'];
		$role 				= $_POST['role'];
		$status 			= $_POST['status'];

		$sql = "INSERT INTO people(firstname,lastname,middlename,birthdate,contactno,email,address,role,status)
				VALUES ('$firstname', '$lastname', '$middlename', '$birthdate', '$contactno', '$email', '$address', '$role', '$status') ";
		$result = mysqli_query($conn,$sql);
		if($result) {
			echo "Insert Successfully!";
		} else {
			echo "not inserted!";
		}
	}

	public function updateData() {
		include "../config/connection.php";
		$id 				= $_POST['id'];
		$firstname 			= $_POST['firstname'];
		$lastname 			= $_POST['lastname'];
		$middlename 		= $_POST['middlename'];
		$birthdate 			= $_POST['birthdate'];
		$contactno 			= $_POST['contactno'];
		$email 				= $_POST['email'];
		$address 			= $_POST['address'];
		$role 				= $_POST['role'];
		$status 			= $_POST['status'];

		$sql = "UPDATE people 
				SET firstname 	= '$firstname',
					lastname 	= '$lastname',
					middlename 	= '$middlename',
					birthdate 	= '$birthdate',
					contactno 	= '$contactno',
					email 		= '$email',
					address 	= '$address',
					role 		= '$role',
					status 		= '$status'
				WHERE id = '$id'  ";
		$result = mysqli_query($conn,$sql);
		if($result) {
			echo 'Update Successfully!';
		} else {
			echo 'not updated!';
		}
	}

	public function generatetoUser() {
		include "../config/connection.php";
		$people_id = $_POST['id'];
		$sql = "SELECT * FROM people WHERE id = '$people_id' ";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$firstname = substr($row['firstname'], 0, 1);
	    $birthdate = substr($row['birthdate'], 8);
	    $contactno = substr(trim($row['contactno']), 7);

	    $fullname = $row['firstname']." ".$row['middlename']." ".$row['lastname'];
	    $username = ucwords($firstname."".ucfirst($row['lastname'])."".$birthdate);
	    $password = strtolower($row['lastname'])."".$contactno;
	    $email = $row['email'];

	    $insert_sql = "INSERT INTO user(people_id,fullname,username,password,email,user_type) VALUES ('$people_id','$fullname', '$username', '$password', '$email', 'user') ";
	    $result_sql = mysqli_query($conn, $insert_sql);
	    if($result_sql) {
	    	echo "Generate to Users!";
	    } else {
	    	echo 'not Generated!';
	    }

	    $update_sql = "UPDATE people SET status = '0' WHERE id = '$people_id' ";
	    $result_update_sql = mysqli_query($conn,$update_sql);
	    if($result_update_sql) {
	    	exit;
	    }

	    

	}

	public function viewData() {
		include "../config/connection.php";

		$sql = "SELECT * FROM people WHERE status = '1' ";
		$result = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		echo json_encode($data);
	}

}