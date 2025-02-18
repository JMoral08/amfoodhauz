<?php 
include "../../config/connection.php";

$sql = "SELECT payment.id,quantity,total_amount,total_qty,overall_total,customer,date_today,payment.status,date_created,productname,amount 
		FROM payment
		INNER JOIN product
		ON payment.order_id = product.id";
		// WHERE date_today = '2024-23-05'
		// WHERE date_today = current_date()
$result = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
}
echo json_encode($data);
//print_r($result);



?>