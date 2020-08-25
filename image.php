<?php 
require_once 'validationInterface.php';

class Image implements ValidatationInterface{

    private $name,$value;

    public function __construct($name,$value){

        $this->name=$name;
        $this->value=$value;
    }

    public function validate(){
        $types=['image/jpeg','image/jpeg','image/png','image/gif'];

        if(!in_array($this->value,$types)){

            return $this->name." must be image [jpg,jpeg,png,gif]";
        }

        return '';
    }

}

?>