<?php 
session_start();
require_once('emoloyees_Tasks_queries.php');

if(!isset($_SESSION['admin_email'])){
    header('location:index.php');
    die();
}

$id=$_GET['id'];
$emp=new Queries();
$result=$emp->deleteTask($id);
        if($result==true){
            header('location:allTasks.php');
        }
    
?> 