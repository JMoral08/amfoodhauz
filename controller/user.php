<?php

class User 
{
	public function viewUser() {
		include "../config/connection.php";
		$sql = "SELECT * FROM user WHERE status = '1' ";
		// $sql = "SELECT username,password,user.date_created,firstname,middlename,lastname,contactno,email 
		// 		FROM user 
		// 		RIGHT JOIN people
		// 		ON user.people_id = people.id
		// 		WHERE user.status = '1' ";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		echo json_encode($data);
	}
	public function removeUser() {
		include "../config/connection.php";
		$id  	= $_POST['id'];

		$update_user = "UPDATE user SET status = '0' WHERE id = '$id' ";
		$user_result = mysqli_query($conn,$update_user);
		if($user_result) {
			echo 'Remove from User!';
		} else {
			echo 'Not remove yet!';
		}
		exit;
		
		// $update_sql = "UPDATE people SET status = '1' WHERE id = '$id' ";
		// $result = mysqli_query($conn,$update_sql);
		// if($result) {
		// 	exit;
		// }
	}
}