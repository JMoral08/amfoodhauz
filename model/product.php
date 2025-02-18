<?php 

include "../controller/product.php";
// print_r($_POST);
if(!empty($_POST)) {
	$action = $_POST['action'];
	switch ($action) {
		case "view":
				$product = new Product();
				$products = $product->viewData();
			break;
		case "insert":
				$product = new Product();
				$products = $product->insertData([
					'product' 		=> $_POST['product'],
					'amount' 		=> $_POST['amount'],
					'categories' 	=> $_POST['categories'],
					'status'		=> $_POST['status']
				]);
			break;
		case "update":
				$product = new Product();
				$products = $product->updateData([
					'id' 			=> $_POST['id'],
					'product' 		=> $_POST['product'],
					'amount' 		=> $_POST['amount'],
					'categories' 	=> $_POST['categories'],
					'status'		=> $_POST['status']
				]);
			break;
		case "delete":
				$product = new Product();
				$products = $product->deleteData([
					'id' 	=> $_POST['id']
				]);
			break;
		
		default:
			echo "null";
			break;
	}
}
?>