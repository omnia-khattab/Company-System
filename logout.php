<?php 
session_start();
/*if(!isset($_SESSION['emp_email'])||!isset($_SESSION['admin_email'])){
    header('location:index.php');
    die();
}*/
session_destroy();
header('Location: index.php');
?>