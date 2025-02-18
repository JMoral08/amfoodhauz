<?php

class Product 
{
	public function viewData() {
		include "../config/connection.php";
		$sql = "SELECT * FROM product 
				ORDER BY productname ASC";
		$result = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		
		echo json_encode($data);
	}

	public function insertData() {
		include "../config/connection.php";
		$productname  	= $_POST['product'];
		$amount 	 	= $_POST['amount'];
		$categories 	= $_POST['categories'];
		$status 		= $_POST['status'];

		$product = "SELECT * FROM product WHERE productname = '$productname' ";
		$sql_product = mysqli_query($conn,$product);
		if(mysqli_num_rows($sql_product) > 0 ) {
			echo "Product has already taken!";
			exit;
		}

		$sql = "INSERT INTO product(productname,amount,categories,status) VALUES ('$productname','$amount','$categories', '$status') ";
		$result = mysqli_query($conn,$sql);
		if ($result) {
			echo "Successfully Added";
		} else {
			echo "Not Added";
		}
	}

	public function updateData() {
		include "../config/connection.php";
		$id 			= $_POST['id'];
		$productname  	= $_POST['product'];
		$amount 	 	= $_POST['amount'];
		$categories 	= $_POST['categories'];
		$status 		= $_POST['status'];

		$sql = "UPDATE product SET productname = '$productname', amount = '$amount', categories = '$categories', status = '$status' WHERE id = '$id'";
		$result = mysqli_query($conn,$sql);
		if($result) {
			echo "Update Successfully!";
		} else {
			echo "Failed ";
		}
		exit;

	}

	public function deleteData() {
		include "../config/connection.php";
		$id 	= $_POST['id'];

		$sql = "DELETE FROM product WHERE id = '$id' ";
		$result = mysqli_query($conn,$sql);
		if($result) {
			echo "Deleted successfully ..";
			exit;
		}
	}


}