<header>
		<nav>
            <?php if(!isset($_SESSION['emp_email'])){?>
			<h1>Company Name</h1>
            <?php } ?>

            <?php 
            if(isset($_SESSION['emp_email'])){
                if($emp_info !==null){  ?>  
                <h1><?php echo $emp_info['name']  ?></h1>
                <img src="<?php echo $emp_info['pic']  ?>" class="rounded-circle" width="40px">  
            <?php }}?>
			<ul id="navli">

                <?php if(!isset($_SESSION['admin_email']) && !isset($_SESSION['emp_email'])){ ?>
                    <li><a class="homered" href="index.php">HOME</a></li>
				<li><a class="homeblack" href="empLogin.php">Employee Login</a></li>
				<li><a class="homeblack" href="admLogin.php">Admin Login</a></li>
                <?php } ?>

                <?php if(isset($_SESSION['admin_email'])){ ?>
                    
				<li><a class="homeblack" href="allTasks.php">All Tasks</a></li>
				<li><a class="homeblack" href="viewEmployees.php">view Employees</a></li>
                <li><a class="homeblack" href="logout.php">logout</a></li>

                <?php } ?>

                <?php if(isset($_SESSION['emp_email'])){?>
                
                <li><a class="homeblack" href="myTasks.php">myTasks</a></li>
				<li><a class="homeblack" href="chat.php">chat</a></li>
				<li><a class="homeblack" href="myProfile.php">profile</a></li>
                <li><a class="homeblack" href="logout.php">logout</a></li>

                <?php }?>

			</ul>
		</nav>
	</header>