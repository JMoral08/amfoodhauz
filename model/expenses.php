<?php

include "../controller/expenses.php";

if(!empty($_POST)) {
	$action = $_POST['action'];
	switch ($action) {
		case "add":
			$data = new Expenses();
			$data->insertExpenses([
				'description' 	=> $_POST['description'],
				'product_amount'=> $_POST['product_amount']
			]);
			break;
		case "update":
			$data = new Expenses();
			$data->updateExpenses([
				'id' 			=> $_POST['id'],
				'description' 	=> $_POST['description'],
				'product_amount'=> $_POST['product_amount']
			]);
			break;
		case "view":
			$data = new Expenses();
			$data->viewExpenses();
			break;
		
		default:
			echo "null";
			break;
	}
}