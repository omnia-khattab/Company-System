<?php 
require_once 'validationInterface.php';

class Email implements ValidatationInterface{

    private $name,$value;

    public function __construct($name,$value){

        $this->name=$name;
        $this->value=$value;
    }

    public function validate(){
        
        if($this->value ===''|| !filter_var($this->value , FILTER_VALIDATE_EMAIL)){
            return $this->name." not valid";
        }

        return '';
    }

}

?>