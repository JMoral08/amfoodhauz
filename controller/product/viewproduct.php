<?php 
include "../../config/connection.php";

$sql = "SELECT * FROM product";
$result = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
}

echo json_encode($data);
// print_r($result);



?>
