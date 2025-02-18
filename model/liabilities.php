<?php

include "../controller/liabilities.php";

if(!empty($_POST)) {
	$action = $_POST['action'];

	switch ($action) {
		case "search":
				$data = new Liabilities();
				$data->searchforLiabilities([
					'customername' 	=> $_POST['customername'],
					'dateofterms' 	=> $_POST['dateofterms']
				]);
			break;
		case "update":
				$data = new Liabilities();
				$data->updateforPayment([
					'id' 	=> $_POST['id']
				]);
			break;
		
		default:
			echo 'null';
			break;
	}
}