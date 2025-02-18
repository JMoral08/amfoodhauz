<?php
include "../controller/order.php";

if(!empty($_POST)) {
	$action = $_POST['action'];
	switch ($action) {
		case "view":
			$order = new Order();
			$orders = $order->viewData();
			break;
		case "showorder":
			$order = new Order();
			$orders = $order->showData([
				'id' 	=> $_POST['id']
			]);
			break;
		case "payment":
			$order = new Order();
			$orders = $order->paymentData([
				// 'id' 				=> $_POST['id'],
				'order_id' 			=> $_POST['order_id'],
				'quantity' 			=> $_POST['quantity'],
				'status' 			=> $_POST['status'],
				'total_amount' 		=> $_POST['total_amount'],
				'total_qty' 		=> $_POST['total_qty'],
				'overall_total' 	=> $_POST['overall_total'],
				'customer' 			=> $_POST['customer'],
				'user'				=> $_POST['user']
			]);
			break;		
		default:
			echo "null";
			break;
	}
}