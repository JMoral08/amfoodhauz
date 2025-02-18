<?php

class Settings 
{
	public function showPeople() {
		include "../config/connection.php";
		$sql = "SELECT * FROM people WHERE status = '1' ";
		$result = mysqli_query($conn,$sql);
		
		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		echo json_encode($data);
	}

	public function viewLiability() {
		include "../config/connection.php";
		$sql = "SELECT SUM(total_amount) as subtotal, SUM(quantity) as totalqty,customer,quantity,total_amount,payment.id,productname,amount
				FROM payment
				INNER JOIN product
				ON payment.order_id = product.id
				WHERE payment.status = '1'
				GROUP BY customer ";
		$result = mysqli_query($conn,$sql);

		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		echo json_encode($data);
	}

	public function showforliability() {
		include "../config/connection.php";
		$customer  	= $_POST['customer'];
		$sql = "SELECT payment.id,quantity,total_amount,customer,overall_total,productname,amount
				FROM payment
				INNER JOIN product
				ON payment.order_id = product.id
				WHERE customer = '$customer' 
				AND payment.status = '1' ";
		$result = mysqli_query($conn,$sql);

		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		echo json_encode($data);
	}

	public function showProduct() {
		include "../config/connection.php";
		$sql = "SELECT * FROM product WHERE status = 'Active' ";
		$result = mysqli_query($conn,$sql);

		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		echo json_encode($data);
	}

	public function showExpenses() {
		include "../config/connection.php";
		$sql = "SELECT * FROM expenses ";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		echo json_encode($data);
	}

}
?>