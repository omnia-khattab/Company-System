<?php 
session_start();
if(isset($_SESSION['admin_email'])){

?>
<!DOCTYPE html>

<html>
  <head>
	<title>Company Name</title>
	<!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
	<link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/styleindex.css">
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css">
	<link rel="stylesheet" type="text/css" href="css/styletasks.css">


  </head>
<body>
<?php 
  require_once 'emoloyees_Tasks_queries.php';
  $emp=new Queries();
  $employees=$emp->selectAll();

?>
<header>
		<nav>
			<h1>Company Name</h1>
			<ul id="navli">
				
				<li><a class="homeblack" href="allTasks.php">All Tasks</a></li>
				<li><a class="homeblack" href="viewEmployees.php">view Employees</a></li>
        <li><a class="homeblack" href="logout.php">logout</a></li>
			</ul>
		</nav>
	</header>
	
    <div class="divider"></div>
    
    <h2 class="task_title" >Empolyees</h2>

    <div class="d-flex justify-content-center">
    <a href='addEmployee.php' class="btn btn-primary text-white my-3  ">Add New Employee</a>
    </div>

		<table>
        <tr>
				<th align = "center">Emp. ID</th>
        <th align = "center">Picture</th>
				<th align = "center">Name</th>
				<th align = "center">Email</th>
				<th align = "center">Birthday</th>
				<th align = "center">Gender</th>
				<th align = "center">city</th>
        <th align = "center">Action</th>
        </tr>
        <?php if($employees !==[]) { 
                foreach($employees as $employee){ ?>       
	
            <tr>

                <td><?php echo $employee['id'] ?></td>
                <td><img src="<?php echo $employee['pic'] ?>" class="rounded-circle" width="50px" alt=""></td>
                <td><?php echo $employee['name'] ?></td>
                <td><?php echo $employee['email'] ?></td>
                <td><?php echo $employee['birthday'] ?></td>
                <td><?php echo $employee['gender'] ?></td>
                <td><?php echo $employee['city'] ?></td>
                <td><a href="deleteEmployee.php?id=<?php echo $employee['id']?>" class="btn btn-danger text-white">Delete</a></td>
                <!--<td><button class="btn btn-danger text-white" value='Delete'>
                //*<?php 
                /*$id=$employee['id'];
                $result=$emp->delete($id);
                        if($result==true){
                            header('location:viewEmployees.php');
                        }*/
                //* ?>
                </button> </td>-->
            </tr>
                <?php } ?>
              <?php } ?>

		</table>

        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    
    <!-- Jquery JS-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="vendor/jquery/jquery.min.js"></script>
   
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <script src="js/global.js"></script> 

  </body>
</html>

<?php 
}
else {
  header('location:index.php');
}
?>
