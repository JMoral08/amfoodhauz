<?php

include "../config/connection.php";
include "../controller/inventory.php";

if (!empty($_POST)) {
	$action = $_POST['action'];
	switch ($action) {
		case "daily":
				$inventory = new Inventory();
				$data = $inventory->dailyRecord([
					'daily' 	=> $_POST['daily']
				]);
			break;
		case "weekly":
				$inventory = new Inventory();
				$data = $inventory->weeklyRecord([
					'from' 	=> $_POST['from'],
					'to' 	=> $_POST['to']
				]);
			break;
		case "monthly":
				$inventory = new Inventory();
				$data = $inventory->monthlyRecord([
					'monthly' 	=> $_POST['monthly']
				]);
			break;
		default:
			echo "null";
			break;
	}
}