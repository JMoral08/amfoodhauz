<?php 

include_once "../../config/connection.php";
if(isset($_POST['insert'])) {

	$productname  	= $_POST['product'];
	$amount 	 	= $_POST['amount'];
	$status 		= $_POST['status'];

	$product = "SELECT * FROM product WHERE productname = '$productname' ";
	$sql_product = mysqli_query($conn,$product);
	if(mysqli_num_rows($sql_product) > 0 ) {
		echo "Productname has Already Taken!";
		exit;
	}

	$sql = "INSERT INTO product(productname,amount,status) VALUES ('$productname','$amount','$status') ";
	$result = mysqli_query($conn,$sql);
	if ($result) {
		echo "Successfully Added";
	} else {
		echo "Not Added";
	}

}

if(isset($_POST['delete'])) {
	$id = $_POST['id'];

	$sql = "DELETE FROM product WHERE id = '$id' ";

	if (mysqli_query($conn,$sql)) {
		echo 'Deleted successfully';
	} else {
		echo 'Not delete';
	}
}

?>