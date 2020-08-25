<?php 
session_start();

require_once('emoloyees_Tasks_queries.php');
require_once('validator.php');

if(!isset($_SESSION['emp_email'])){
    header('location:index.php');
    die();
}

if(isset($_POST['send'])){

    $task_id=$_GET['id'];
    $status=$_POST['send'];

    $quer=new Queries();
    $result=$quer->updateStatus($task_id,$status);

    if($result==true){ 
        header('location:myTasks.php');
    }    
}
else{
    header('location:myTasks.php');
}


?> 