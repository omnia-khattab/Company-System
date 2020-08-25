<?php 
session_start();

require_once('admins.php');
require_once('validator.php');

if(isset($_POST['login-submit'])){

    $email=$_POST['email'];
    $password=$_POST['password'];

    //validation
    $v=new validator;
    $v->rules('email',$email,['required','email']);
    $v->rules('password',$password,['required','password']);

    $errors=$v->errors;

    if(empty($errors)){

        $admin=new Admin();

        $result=$admin->login($email,$password);
        
        if($result !== null){
            $_SESSION['admin_email']=$result['email'];
            header('location:viewEmployees.php');
        }
        else{
        $_SESSION['errors']=['your Email not exist'];
        header('location:admLogin.php');
        }
    }
    else{
        $_SESSION['errors']=$errors;
        header('location:admLogin.php');
    }
    }


else{
    header('location:admLogin.php');
}


?> 