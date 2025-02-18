<?php
session_start();
class Login 
{
	public function loginData() 
	{
		include "../config/connection.php";
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM user 
				WHERE username = '$username' 
				AND password = '$password' ";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			if($username = $row['username'] && $password == $row['password']) {
				if ($row['user_type'] == 'admin') {
					$_SESSION['id'] = $row['id'];
					$_SESSION['fullname'] = $row['fullname'];
					$_SESSION['user_type'] = $row['user_type'];
					$data[] = $row;
					echo 'Admin Login Successful!';
				} else if ($row['user_type'] == 'user') {
					$_SESSION['id'] = $row['id'];
					$_SESSION['fullname'] = $row['fullname'];
					$_SESSION['user_type'] = $row['user_type'];;
					$data[] = $row;
					echo 'User Login Successful!';
				} else {
					echo 'Your not admin and user!';
				}
			}
		} else {
			echo 'Please check the email and password!';
		}
	}
}