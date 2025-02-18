<?php 
include "../controller/settings.php";

if(!empty($_POST)) {
	$action = $_POST['action'];
	switch ($action) {
		case "peopleview":
			$settings = new Settings();
			$data = $settings->showPeople();
			break;
		case "liabilityview":
			$settings = new Settings();
			$data = $settings->viewLiability();
			break;
		case "showLiability":
			$settings = new Settings();
			$data = $settings->showforliability([
				'customer'  => $_POST['customer'] 
			]);
			break;
		case "productview":
			$settings = new Settings();
			$data = $settings->showProduct();
			break;
		case "expensesview":
			$settings = new Settings();
			$data = $settings->showExpenses();
			break;
		default:
			echo "null";
			break;
	}
}
?>