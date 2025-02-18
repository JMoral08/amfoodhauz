<?php 

class Profile
{
	public function viewProfile() {
		include "../config/connection.php";
		$id = $_GET['id'];
        $sql = "SELECT fullname,username,password,user.email,firstname,middlename,lastname,birthdate,contactno 
                FROM user
                INNER JOIN people 
                ON user.people_id = people.id
                WHERE user.id = $id ";
        $result = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		echo json_encode($data);
	}

	public function changeProfile() {
		include "../config/connection.php";
		$id 		= $_POST['id'];
		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		$usertype 	= $_POST['usertype'];

		$sql = "UPDATE user SET username = '$username', password = '$password', user_type = '$usertype' WHERE id = '$id' ";
		$result = mysqli_query($conn,$sql);
		if($result == true) {
			echo "Save and Changes!";
		} else {
			echo "Failed!";
		}
		exit;
	}
}

?>