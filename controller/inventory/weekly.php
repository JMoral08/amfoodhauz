<?php

include "../../config/connection.php";

$from 		= $_GET['from'];
$to 		= $_GET['to'];

$sql = "SELECT payment.id,order_id,quantity,total_amount,date_today,productname,amount
		FROM payment
		INNER JOIN product
		ON payment.order_id = product.id
		WHERE date_today BETWEEN '$from' AND '$to' ";
$result = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row; 
}
echo json_encode($data);

// SELECT * FROM data 
// WHERE datetime BETWEEN '2009-10-20 00:00:00' AND '2009-10-20 23:59:59'

?>
