<?php

include "../../config/connection.php";

$product_id  			= $_POST['product'];
$quantity 				= $_POST['quantity'];
$customer 				= $_POST['customer'];

$sql = "INSERT INTO order_product (product_id, quantity, customername) VALUES ('$product_id', '$quantity', '$customer') ";

$result = mysqli_query($conn, $sql);

if($result == TRUE) {
	echo "Successfully Added";
} else {
	echo "Failed! " . mysqli_error($conn);
}
