<?php 
session_start();

require_once('employees.php');
require_once('validator.php');



if(isset($_POST['login-submit'])){

    $email=$_POST['email'];
    $password=$_POST['password'];

    //validation
    $v=new validator;
    $v->rules('email',$email,['required','email','String']);
    $v->rules('password',$password,['required','password','String']);

    $errors=$v->errors;

    if(empty($errors)){

            $emp=new Employee();
            $result=$emp->login($email,$password);
            
            if($result !== null){
                $_SESSION['emp_email']=$result['email'];
                header('location:myTasks.php');
            }
            else{
            $_SESSION['errors']=['your Email not exist'];
            header('location:empLogin.php');
            }
    }
        else{
            $_SESSION['errors']=$errors;
            header('location:empLogin.php');
        }
}
else{
    header('location:empLogin.php');
}

?> 