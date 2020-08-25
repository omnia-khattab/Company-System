<?php 
require_once 'validationInterface.php';

class required implements ValidatationInterface{

    private $name,$value;

    public function __construct($name,$value){

        $this->name=$name;
        $this->value=$value;
    }

    public function validate(){
        
        if(strlen($this->value)==0){
            return $this->name." is required";
        }

        return '';
    }

}

?>