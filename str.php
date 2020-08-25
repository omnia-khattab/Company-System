<?php 
require_once 'validationInterface.php';

class Str implements ValidatationInterface{

    private $name,$value;

    public function __construct($name,$value){

        $this->name=$name;
        $this->value=$value;
    }

    public function validate(){
        if($this->value ===''|| !is_string($this->value)){
            
            return $this->name.' must be string';
        }

        return '';
    }

}

?>