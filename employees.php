<?php 

require_once 'sqlConnection.php';

class Employee extends Connection{

    public function login($email,$password){

        $query="SELECT * FROM employees
        WHERE email='$email' AND password='$password' ";

        $result=$this->connect()->query($query);
        $emp=null;

        if(mysqli_num_rows($result)==1){
            while($row=$result->fetch_assoc()){
                
                $emp=$row;
            }
        }

    return $emp;

    }

}

?>