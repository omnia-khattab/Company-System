<?php 

require_once 'sqlConnection.php';

class Queries extends Connection{


    public function add(array $data){

        $query="INSERT INTO employees (name,email ,password ,phone ,city ,gender,birthday)
        VALUES ('{$data['name']}','{$data['email']}','{$data['password']}','{$data['phone']}','{$data['city']}',
        '{$data['gender']}','{$data['birthday']}');";

        $result=$this->connect()->query($query);
        if($result==true)
        {
            return true;
        }

        return false;
    }

    public function selectAll(){
        $query="SELECT * FROM employees";
        $result=$this->connect()->query($query);
        $employees=[];

        if(mysqli_num_rows($result)>0)
        {
            while($row = $result->fetch_assoc() )
            {
                array_push($employees, $row);
            }
        }

        return $employees;
    }
    

    public function delete($id){

        $query="DELETE FROM employees
        WHERE id=$id;";

        $result=$this->connect()->query($query);
        if($result==true)
        {
            return true;
        }

        return false;
    }

    //tasks

    public function selectAllTasks(){
        $query="SELECT e.name as employee_name ,t.*
        FROM employees e JOIN tasks t
        ON e.id=t.emp_id";
        $result=$this->connect()->query($query);
        $tasks=[];

        if(mysqli_num_rows($result)>0)
        {
            while($row = $result->fetch_assoc() )
            {
                array_push($tasks, $row);
            }
        }

        return $tasks;
    }
    
    public function selectTaskById( $id){
        $query="SELECT e.name as employee_name ,t.*
        FROM employees e JOIN tasks t
        ON e.id=t.emp_id
        WHERE t.emp_id=$id ";

        $result=$this->connect()->query($query);
        $task=null;

        if(mysqli_num_rows($result)==1)
        {
            while($row = $result->fetch_assoc() )
            {
                $task=$row;
            }
        }

        return $task;
    }

    public function addTask($name,array $data){

        $query="INSERT INTO tasks (emp_id,task_name,descr,status,deadline)
        VALUES ((SELECT id FROM employees WHERE name='$name'),'{$data['task_name']}',
        '{$data['descr']}','{$data['status']}','{$data['deadline']}')";

        $result=$this->connect()->query($query);
        if($result==true)
        {
            return true;
        }

        return false;
    }

    public function selectEmpNames(){
        $query="SELECT name FROM employees";
        $result=$this->connect()->query($query);
        $names=[];

        if(mysqli_num_rows($result)>0)
        {
            while($row = $result->fetch_assoc() )
            {
                array_push($names, $row);
            }
        }

        return $names;
    }
    public function selectEmpNamesByID($id){
        $query="SELECT name FROM employees WHERE id='$id'";
        $result=$this->connect()->query($query);
        $names=[];

        if(mysqli_num_rows($result)>0)
        {
            while($row = $result->fetch_assoc() )
            {
                array_push($names, $row);
            }
        }

        return $names;
    }
    
    public function selectMyTasks($email){
        $query="SELECT emp_id,task_name,descr,status,deadline
        from tasks
        WHERE emp_id=(SELECT id 
                    FROM employees
                    WHERE email='$email'";
                    
        $result=$this->connect()->query($query);
        $tasks=[];

        if(mysqli_num_rows($result)>0)
        {
            while($row = $result->fetch_assoc() )
            {
                array_push($tasks, $row);
            }
        }

        return $tasks;
    }

    public function update( $id,array $data){
        $query="UPDATE tasks
        SET task_name='{$data['task_name']}',
                descr='{$data['descr']}',
                status='{$data['status']}',
                deadline='{$data['deadline']}'
        WHERE emp_id=$id;";

        $result=$this->connect()->query($query);
        if($result==true)
        {
            return true;
        }

        return false;
    }

    public function deleteTask($id){

        $query="DELETE FROM tasks
        WHERE task_id=$id;";

        $result=$this->connect()->query($query);
        if($result==true)
        {
            return true;
        }

        return false;
    }
    public function AssignTask($id,array $data){
        $query="UPDATE tasks 
        SET emp_id=(SELECT id FROM employees WHERE name='{$data['emp_name']}'),
                status='{$data['status']}',
                deadline='{$data['deadline']}'
        WHERE task_id=$id";
    
        $result=$this->connect()->query($query);
        if($result==true)
        {
            return true;
        }
    
        return false;
    }
    //Employee Tasks

    public function selectEmpID($email){
        $query="SELECT id FROM employees
        WHERE email='$email'";
        $result=$this->connect()->query($query);
        $id=null;

        if(mysqli_num_rows($result)==1)
        {
            while($row = $result->fetch_assoc() )
            {
                $id=$row['id'];
            }
        }

        return $id;
    }
    
    public function selectMyTaskById($id){
        $query="SELECT e.name as employee_name ,t.*
        FROM employees e JOIN tasks t
        ON e.id=t.emp_id
        WHERE t.emp_id=$id ";
        $result=$this->connect()->query($query);
        $tasks=[];

        if(mysqli_num_rows($result)>0)
        {
            while($row = $result->fetch_assoc() )
            {
                
                array_push($tasks,$row);
            }
        }

        return $tasks;
    
    }

    public function selectEmpByID($id){
        $query="SELECT * FROM employees WHERE id=$id ";
        $result=$this->connect()->query($query);
        $employee=null;

        if(mysqli_num_rows($result)==1)
        {
            while($row = $result->fetch_assoc() )
            {
                $employee=$row;
            }
        }

        return $employee;
    }
    public function updateEmpInfo($id,array $data){
        $query="UPDATE employees
        SET name ='{$data['name']}',
                email='{$data['email']}',
                password='{$data['password']}',
                phone='{$data['phone']}',
                city='{$data['city']}',
                gender ='{$data['gender']}', 
                pic ='{$data['pic']}' 
        WHERE id=$id";
        $result=$this->connect()->query($query);
        if($result==true)
        {
            return true;
        }

        return false;
    }

    public function selectAssignedTask($id){
        $query="SELECT e.name as employee_name ,t.*
        FROM employees e JOIN tasks t
        ON e.id=t.emp_id
        WHERE t.task_id=$id ";
        $result=$this->connect()->query($query);
        $tasks=[];

        if(mysqli_num_rows($result)==1)
        {
            while($row = $result->fetch_assoc() )
            {
                $tasks=$row;
            }
        }

        return $tasks;
    
    }

    public function updateStatus($id,$status){
        $query="UPDATE tasks
        SET status ='$status'
        WHERE task_id=$id";

        $result=$this->connect()->query($query);
        if($result==true)
        {
            return true;
        }

        return false;
    }

}


?>