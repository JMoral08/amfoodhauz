<?php

class Order 
{
	public function viewData() {
		include "../config/connection.php";
		$sql = "SELECT * FROM product WHERE status = 'Active' ORDER BY productname ASC";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		echo json_encode($data);
	}

	public function showData() {
		include "../config/connection.php";
		$id = $_POST['id'];

		$sql = "SELECT * FROM product WHERE id = '$id' ";
		$result = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_assoc($result)) {
		    $data[] = $row;
		}
		echo json_encode($data);
	}

	public function paymentData() {
		include "../config/connection.php";
		// $id 			= $_POST['id'];
		$order_id 		= $_POST['order_id'];
		$quantity 		= $_POST['quantity'];
		$total_amount 	= $_POST['total_amount'];
		$total_qty 		= $_POST['total_qty'];
		$overall_total 	= $_POST['overall_total'];
		$customer 		= $_POST['customer'];
		$user 			= $_POST['user'];
		$status 		= $_POST['status'];
		
		// $update_sql = "UPDATE payment SET status = '1', customer = '$customer' WHERE id = '$order_id' ";
		// if (mysqli_query($conn,$update_sql)) {
		// 	echo "Payment! ";
		// }

		$sql = "INSERT INTO payment(id,order_id,user_id,quantity,total_amount,total_qty,overall_total,customer,date_today, status)
				VALUES (null,'$order_id','$user','$quantity','$total_amount','$total_qty','$overall_total','$customer',CURRENT_DATE(), '$status' ) ";

		if (mysqli_query($conn,$sql)) {
			echo "Payment Successfully..";
		} else {
			echo "Not Added";
		}

	}
	
}