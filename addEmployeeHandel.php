<?php 
session_start();

require_once('emoloyees_Tasks_queries.php');
require_once('validator.php');

if(!isset($_SESSION['admin_email'])){
    header('location:index.php');
    die();
}

if(isset($_POST['btn_submit'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $city=$_POST['city'];
    $birthday=$_POST['birthday'];
    
    //validation
    $v=new validator;
    $v->rules('name',$name,['required','String','max:100']);
    $v->rules('email',$email,['required','email']);
    $v->rules('password',$password,['required','password']);
    $v->rules('gender',$gender,['required','String']);
    $v->rules('phone',$phone,['required','Number']);
    $v->rules('city',$city,['required','String','max:100']);

    $errors=$v->errors;
    
    if(empty($errors)){

        $employee_data=['name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'phone'=>$phone,
            'city'=>$city,
            'gender'=>$gender,
            'birthday'=>$birthday];
        $quer=new Queries();
        $result=$quer->add($employee_data);

        if($result==true){
            header('location:viewEmployees.php');
        }
    }    
    else{
        $_SESSION['errors']=$errors;
        header('location:addEmployee.php');
        }
    }


else{
    header('location:addEmployee.php');
}


?> 