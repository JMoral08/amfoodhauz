<?php

class Expenses 
{
	public function insertExpenses() {
		include "../config/connection.php";
		$description 		= $_POST['description'];
		$product_amount 	= $_POST['product_amount'];

		$sql = "INSERT INTO expenses (description,product_amount,datetoday)
				VALUES ('$description','$product_amount', CURRENT_DATE()) ";
		$result = mysqli_query($conn,$sql);

		if($result == true) {
			echo "Product Description Insert Successfully";
		} else {
			echo "not inserted";
		}
	}

	public function updateExpenses() {
		include "../config/connection.php";
		$id 			= $_POST['id'];
		$description 	= $_POST['description'];
		$product_amount = $_POST['product_amount'];

		$sql = "UPDATE expenses SET description = '$description', product_amount = '$product_amount' WHERE id = '$id' ";
		$result = mysqli_query($conn,$sql);

		if($result) {
			echo 'Update Successfully';
		} else {
			echo 'null';
		}
	}

	public function viewExpenses() {
		include "../config/connection.php";
		$sql = "SELECT * FROM expenses";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		echo json_encode($data);
	}
}