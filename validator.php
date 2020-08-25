<?php 
require_once 'require.php';
require_once 'email.php';
require_once 'password.php';
require_once 'str.php';
require_once 'max.php';
require_once 'numeric.php';
require_once 'image.php';
class validator{

    public $errors=[];

    private function checkValidation(ValidatationInterface $val){

        return $val->validate();

    }

    public function rules($name,$value,array $rules){

        foreach($rules as $rule){
            if($rule=='required'){
                $error=$this->checkValidation(new required($name,$value));
            }
            else if($rule=='email'){
                $error=$this->checkValidation(new Email($name,$value));
            }
            else if($rule=='password'){
                $error=$this->checkValidation(new Password($name,$value));
            }
            else if($rule=='String'){
                $error=$this->checkValidation(new Str($name,$value));
            }
            else if($rule=='max:100'){
                $error=$this->checkValidation(new Max($name,$value));
            }
            else if($rule=='Number'){
                $error=$this->checkValidation(new Numeric($name,$value));
            }
            else if($rule=='image'){
                $error=$this->checkValidation(new Image($name,$value));
            }
            else {
                $error='';
            }
            if($error !==''){
                array_push($this->errors,$error);
            }
        }

    }

}

?>