<?php 

class Liabilities 
{

	public function searchforLiabilities() {
		include "../config/connection.php";
		$customername 		= $_POST['customername'];
		//$dateofterms 		= $_POST['dateofterms'];

		// $exist_sql = "SELECT * FROM payment WHERE status != '1' AND customer = '$customername' ";
		// $exist_result = mysqli_query($conn,$exist_sql);
		// if(mysqli_num_rows($exist_result) > 0 ) {
		// 	echo "Customer not exist!";
		// 	exit;
		// }

		$sql = "SELECT payment.id,order_id,quantity,total_amount,customer,date_today,productname,amount
				FROM payment
				INNER JOIN product
				INNER JOIN user
				ON payment.order_id = product.id
				AND payment.user_id = user.id
				WHERE customer = '$customername'
				AND payment.status = '1' ";
				// AND payment.customer != ''
				// AND date_today = '$dateofterms' 
		$result = mysqli_query($conn,$sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$data[] = $row; 
		}
		echo json_encode($data);
		
	}

	public function updateforPayment() {
		include "../config/connection.php";
		$id 	= $_POST['id'];

		$sql = "UPDATE payment SET status = '0' WHERE id = '$id' ";
		$result = mysqli_query($conn,$sql);
		if($result) {
			echo "Update Payment";
		} else {
			echo "not updated";
		}
		exit;
	}


}