<?php

include "../../config/connection.php";

$id = $_POST['id'];

$sql = "SELECT * FROM product WHERE id = '$id' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

echo json_encode($row);