<?php

include "../../config/connection.php";

if($_POST) {
	$id = $_POST['id'];

	$sql = "DELETE FROM product WHERE id = '$id' ";

	if (mysqli_query($conn,$sql)) {
		echo 'Deleted successfully';
	} else {
		echo 'Not delete';
	}
}