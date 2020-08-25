<?php 
require_once 'validationInterface.php';

class Max implements ValidatationInterface{

    private $name,$value;

    public function __construct($name,$value){

        $this->name=$name;
        $this->value=$value;
    }

    public function validate(){
        if(strlen($this->value)>100){
            
            return $this->name.'must be less than 100 char';
        }

        return '';
    }

}

?>