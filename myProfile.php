<?php 
session_start();

if(isset($_SESSION['emp_email'])){

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

    $email= $_SESSION['emp_email'];
    //var_dump($email);
    $id=$emp->selectEmpID($email);
    //var_dump($id);
    $emp_info=$emp->selectEmpByID($id);
    //var_dump($emp_info);

?>
<header>
		<nav>
    <?php 
      if($emp_info !==null){  ?>  
        <h1><?php echo $emp_info['name']  ?></h1>
        <img src="<?php echo $emp_info['pic']  ?>" class="rounded-circle" width="40px">  
      <?php }?>
			<ul id="navli">
        
        <li><a class="homeblack" href="myTasks.php">myTasks</a></li>
				<li><a class="homeblack" href="chat.php">chat</a></li>
				<li><a class="homeblack" href="myProfile.php">profile</a></li>
        <li><a class="homeblack" href="logout.php">logout</a></li>
			</ul>
		</nav>
	</header>
	
	<div class="divider"></div>


<!-- <form id = "registration" action="edit.php" method="POST"> -->
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    
                    <form method="POST" action="myProfileHandel.php?id=<?php echo $id?>" enctype="multipart/form-data" >
                    <?php if(isset($_SESSION['errors'])){  ?>
                      <div class="alert alert-danger">
                          <?php foreach($_SESSION['errors'] as $error){  ?>
                          <p><?php echo $error ?></p>
                          <?php }?>
                      </div>
                    <?php }?>
                    <?php unset($_SESSION['errors']); ?>
                
                        <?php if($emp_info !==null){  ?>
                        <div class="d-flex justify-content-center"> 
                            <img src="<?php echo $emp_info['pic']  ?>" class="rounded-circle" name="profile"  width="100px">
                        </div>
                        <?php }?>

                        <div class="input-group ">
                        <h2 class="title" >My Info</h2>
                        </div>

                        <!--<div class="row row-space">
                            <div class="col-5">-->
                                <div class="input-group">
                                  <p>Name</p>
                                  <?php if($emp_info !==null){  ?>
                                      <input class="input--style-1" type="text" name="name" value="<?php echo $emp_info['name']  ?>"  >
                                      <?php }?>
                                </div>
                            <!--</div>-->
                            <!--<div class="col-5">
                                <div class="input-group">
                                  <p>Last Name</p>
                                    <input class="input--style-1" type="text" name="lastName" value="" >
                                </div>
                            </div>
                        </div>-->

                        <div class="input-group">
                          <p>Email</p>
                          <?php if($emp_info !==null){  ?>
                            <input class="input--style-1" type="email"  name="email" value="<?php echo $emp_info['email']  ?>" >
                            <?php }?>
                        </div>

                        <div class="input-group">
                          <p>Password</p>
                          <?php if($emp_info !==null){  ?>
                            <input class="input--style-1" style="color: #666;" type="password"  name="password" value="<?php echo $emp_info['password']  ?>" >
                            <?php }?>
                        </div>
                        
                        <div class="row row-space">
                            <div class="col-5">
                                <div class="input-group">
                                  <p>City</p>
                                  <?php if($emp_info !==null){  ?>
                                    <input class="input--style-1" type="text" name="city" value="<?php echo $emp_info['city']  ?>" >
                                    <?php }?>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group">
                                  <p>Gender</p>
                                  <?php if($emp_info !==null){  ?>
                                  <input class="input--style-1" type="text" name="gender" value="<?php echo $emp_info['gender']  ?>" >
                                  <?php }?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                          <p>Phone Number</p>
                          <?php if($emp_info !==null){  ?>
                            <input class="input--style-1" type="number" name="phone" value="<?php echo $emp_info['phone']  ?>" >
                            <?php }?>
                        </div>
                        <div class="input-group">
                          <p>picture</p>
                          <?php if($emp_info !==null){  ?>
                            <input class="input--style-1" type="file" name="pic" value="<?php echo $emp_info['pic']  ?>" >
                            <?php }?>
                        </div>



                        <input type="hidden" name="id" id="textField" value="" required="required"><br><br>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" name="send" >Update Info</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>


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
