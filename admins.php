<?php 

require_once 'sqlConnection.php';

class Admin extends Connection{

    public function login($email,$password){

        $query="SELECT * FROM admins
        WHERE email='$email' AND password='$password' ";

        $result=$this->connect()->query($query);
        $admin=null;

        if(mysqli_num_rows($result)==1){
            while($row=$result->fetch_assoc()){
                
                $admin=$row;
            }
        }

    return $admin;

    }

}

?>