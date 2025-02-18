<?php 

include "../../config/connection.php";

//print_r($_POST);
$order_id 			= $_POST['order_id'];
$quantity 			= $_POST['quantity'];
$total_amount  		= $_POST['total_amount'];
$total_quantity  	= $_POST['total_qty'];
$overall_total 	 	= $_POST['overall_total'];
$customer 			= $_POST['customer'];
$datetoday 			= $_POST['datetoday'];

$sql = "INSERT INTO payment(order_id,quantity,total_amount,total_qty,overall_total,customer,date_today) 
		VALUES ('$order_id','$quantity','$total_amount','$total_quantity','$overall_total','$customer',CURRENT_DATE())";

if (mysqli_query($conn,$sql)) {
	echo "Successfully Added";
} else {
	echo "Not Added";
}


?>