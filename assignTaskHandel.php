<?php 
session_start();

require_once('emoloyees_Tasks_queries.php');
require_once('validator.php');

if(!isset($_SESSION['admin_email'])){
    header('location:index.php');
    die();
}

if(isset($_POST['btn_submit'])){
    $task_id=$_GET['task_id'];
    //$emp_id=$_GET['id'];

    $emp_name=$_POST['emp_name'];
    $task_name=$_POST['task_name'];
    $status=$_POST['status'];
    $deadline=$_POST['deadline'];
    
    //validation
    $v=new validator;
    $v->rules('employee name',$emp_name,['required','String','max:100']);
    $v->rules('status',$status,['required']);
    $v->rules('deadline',$status,['']);

    $errors=$v->errors;
    
    if(empty($errors)){

        $task_data=[
            'emp_name'=>$emp_name,
            'status'=>$status,
            'deadline'=>$deadline];
        $quer=new Queries();
        $result=$quer->AssignTask($task_id,$task_data);

        if($result==true){
            header('location:allTasks.php');
        }
    }    
    else{
        $_SESSION['errors']=$errors;
        //echo "error".$emp_id." ".$task_id;
        header('location:assignTasks.php?id='.$task_id);


        }
    }


else{
    header('location:assignTasks.php?id='.$task_id);
}


?> 