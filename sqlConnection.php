<?php 

class Connection{

    private $serverName,$dbName,$dbPasword,$dbUser;

    public function connect(){
        $this->serverName='localhost';
        $this->dbName='employee_system';
        $this->dbUser='root';
        $this->dbPasword='';

        $con=new mysqli($this->serverName,$this->dbUser,$this->dbPasword,$this->dbName);
        return $con;
    }

}


?>