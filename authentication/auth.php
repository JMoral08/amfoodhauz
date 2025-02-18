<?php
session_start();
if(!isset($_SESSION['id']) || !isset($_SESSION['fullname'])) {
    header("location: index.php");
} else if ($_SESSION['user_type'] == 'admin') {
    $username = $_SESSION['fullname'];
    $id = $_SESSION['id'];
} else if ($_SESSION['user_type'] == 'user') {
    $username = $_SESSION['fullname'];
    $id = $_SESSION['id'];
}
?>

<?php
//session_start();
//if(!isset($_SESSION['id']) || !isset($_SESSION['fullname'])) {
    //$username = $_SESSION['fullname'];
    //$id = $_SESSION['id'];
    //$user_type = $_GET['user_type'];
    //if($user_type == '0') {
       // header("location: user.php");
    //} else if($user_type == '1') {
       // header("location: order.php");
   // } else {
     //   header("location: index.php");
    //}
//}
//else {
 //   header("location:index.php");
//}
?>