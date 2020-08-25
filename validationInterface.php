<?php 

interface ValidatationInterface{

    public function __construct($name,$value);
    public function validate();
}


?>