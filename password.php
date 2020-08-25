<?php 
require_once 'validationInterface.php';
require_once 'sqlConnection.php';

class Password implements ValidatationInterface{

    private $name,$value;

    public function __construct($name,$value){

        $this->name=$name;
        $this->value=$value;
    }

    public function validate(){
        
        if($this->value ===''|| !preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{6,}$/", $this->value)){
            return $this->name." not valid ,password should contain numbers,chars and more than 6 char";
        }

        return '';
    }


}

?>