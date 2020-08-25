<?php 

require_once 'validationInterface.php';

class Numeric implements ValidatationInterface{

    private $name,$value;

    public function __construct($name,$value){

        $this->name=$name;
        $this->value=$value;
    }

    public function validate(){
        if(strlen($this->value)>0 && !is_numeric($this->value)){
            
            return $this->name.'not a number';
        }

        return '';
    }

}

?>