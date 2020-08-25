<?php 
session_start();

require_once('emoloyees_Tasks_queries.php');
require_once('validator.php');

if(!isset($_SESSION['admin_email'])){
    header('location:index.php');
    die();
}

if(isset($_POST['btn_submit'])){
    $id=$_GET['id'];
    $emp_name=$_POST['emp_name'];
    $task_name=$_POST['task_name'];
    $desc=$_POST['desc'];
    $status=$_POST['status'];
    $deadline=$_POST['deadline'];
    
    //validation
    $v=new validator;
    $v->rules('employee name',$emp_name,['required','String','max:100']);
    $v->rules('project name',$task_name,['required','String','max:100']);
    $v->rules('Description',$desc,['required','String']);
    $v->rules('status',$status,['']);
    $v->rules('deadline',$status,['']);

    $errors=$v->errors;
    
    if(empty($errors)){

        $task_data=[
            'task_name'=>$task_name,
            'descr'=>$desc,
            'status'=>$status,
            'deadline'=>$deadline];
        $quer=new Queries();
        $result=$quer->update($id,$task_data);

        if($result==true){
            header('location:allTasks.php');
        }
    }    
    else{
        $_SESSION['errors']=$errors;
        header('location:editTask.php?id='.$id);
        }
    }


else{
    header('location:editTask.php?id='.$id);
}


?> 