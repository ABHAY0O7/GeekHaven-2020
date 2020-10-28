  
<?php
    // include './addmember.php'
    require "../database/member_info.php";
    session_start();
    include 'auth.php';
    $res = callCheck();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Change Password</title>
    <link rel="shortcut icon" href="../images/gh.svg" type="image/png" />
    <link rel="stylesheet" href="form.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Roboto:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>

        <!--CSS Spinner-->
    <div class="b1">
        <div class="e-loadholder">
            <div class="m-loader">
                <span class="e-text">Geekhaven</span>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-fixed-top"style="opacity: 0.9;">
        <div class="container-fullwidth" style="padding: 0 5%;">
          <a href="../index.php"><img class="nav-logo" src="../images/gh.png"></a>
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" style="color: aliceblue !important;" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
          </div>
      
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="./home.php">Home</a></li>
                <li><a href="https://medium.com/nybles">Blogs</a></li>
                <li><a href="./updateProfile.php">Update Profile</a></li>
                <li><a href="./logout.php">Logout</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
	  </nav>
	  <style>
		  
	  </style>
	  
      <section class="form" style="margin-top: 200px;;margin-bottom: 50px;">
		<div class="container" style="background: #171717;border-radius: 16px;">
			<form method='post'  style="text-align: center;" enctype="multipart/form-data">
        <p class="contactUs" >Change Password</p> 
                <div class="form-group col-lg-12">
                Current Password : <?php 
                    $mem_id = $_SESSION['member_id'];                                    
                    $query = "SELECT * FROM credentials WHERE `member_id` = '$mem_id'";
                    $query_run = mysqli_query($connection,$query);       
                    while($row = mysqli_fetch_assoc($query_run)){
                        $pass =$row['password'];   
                    }             
                    echo $pass;
                ?>
				</div>

				<div class="form-group col-lg-12">
					<input name="pass" type="password" required></input>
					<span class="floating-label">Password</span>
				</div>
        <div class="form-group col-lg-12">
					<input name="pass2" type="password" required></input>
					<span class="floating-label">Confirm Password</span>
				</div>
				
				<div class="form-group form-button">             
					<button name="submit" type="submit" class="form-submit button" >Update</button>
				</div>   	
			</form>
            <?php
            if(isset($_POST['submit'])){
                $pass = $_POST['pass'];
                $cpass = $_POST['pass2'];
                $mem_id = $_SESSION['member_id'];                
                if($pass == $cpass){
                    $query = "UPDATE credentials SET `password`='$pass' WHERE `member_id` = '$mem_id'";
                    $query_run = mysqli_query($connection,$query);                    
                    echo "Password Updated Successfully";
                }else{
                    echo "Password and Confirm Password are not same";
                }
            }
        ?>
        </div>   

		<script src="https://code.jquery.com/jquery-2.1.3.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
      
        <script type="text/javascript" src="form.js"></script>

</body>
</html>      