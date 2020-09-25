<?php 
session_start();

require_once('emoloyees_Tasks_queries.php');
require_once('validator.php');

if(!isset($_SESSION['emp_email'])){
    header('location:index.php');
    die();
}

$quer=new Queries();

if(isset($_POST['send'])){
    $id=$_GET['id'];

    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $city=$_POST['city'];
    //oldImage
    $emp_info=$quer->selectEmpByID($id);
    $oldImg=$emp_info['pic'];
    //image
    $image=$_FILES['pic'];
    $imageType=$image['type'];
    $imageTemp=$image['tmp_name'];
    $imageName=$image['name'];
    $target_dir ="images/";
    $target_file = $target_dir.basename($imageName);
    $path=$target_dir.time().uniqid().$imageName;

    $extension = pathinfo($imageName, PATHINFO_EXTENSION);
    /*echo $path."<br>".$extension;
    die();*/
    //validation
    $v=new validator;
    $v->rules('name',$name,['required','String','max:100']);
    $v->rules('email',$email,['required','email']);
    $v->rules('password',$password,['required','password']);
    $v->rules('gender',$gender,['required','String']);
    $v->rules('phone',$phone,['required','Number']);
    $v->rules('city',$city,['required','String','max:100']);
    
    if($imageName !==""){
        $v->rules('image',$imageType,['image']);
    }
    $errors=$v->errors;

    if(empty($errors)){
        
        if(!file_exists($target_file)){
            
            $employee_data=['name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'phone'=>$phone,
            'city'=>$city,
            'gender'=>$gender,
            'pic'=>$path ];

            $result=$quer->updateEmpInfo($id,$employee_data);
            if($result==true){
                move_uploaded_file($imageTemp,$path);
                header('location:myProfile.php?id='.$id);
            }
        }
        else{
            
            $employee_data=['name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'phone'=>$phone,
            'city'=>$city,
            'gender'=>$gender,
            'pic'=>$oldImg ];

            $result=$quer->updateEmpInfo($id,$employee_data);
            if($result==true){
                $_SESSION['emp_email']=$email;
                header('location:myProfile.php?id='.$id);
            }
        }
    }    
    else{
        $_SESSION['errors']=$errors;
        header('location:myProfile.php?id='.$id);
        }
    }


else{
    header('location:myProfile.php?id='.$id);
}


?> 