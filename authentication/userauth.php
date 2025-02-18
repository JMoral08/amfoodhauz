<?php
session_start();
if(!isset($_SESSION['id']) || !isset($_SESSION['fullname'])) {
    header("location: index.php");
} else if ($_SESSION['user_type'] == 'user') {
    $username = $_SESSION['fullname'];
    $id = $_SESSION['id'];
}
?>