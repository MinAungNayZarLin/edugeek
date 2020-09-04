<?php 
	include_once 'header.php';
	include_once 'php/component.php';
	include_once 'database/config.php';
	if(isset($_POST['submit'])){
		$username =  mysqli_real_escape_string($conn,$_POST['username']);
		$pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
		if(count($_POST)>0) {
			$result = mysqli_query($conn,"SELECT * FROM userregisteration WHERE username = '$username' && password = '$pwd'" );
			@$_SESSION["user"] = $username;
			$count  = mysqli_num_rows($result);
			echo $count;
		if($count==0) {
			header('location:login.php');
			echo "ERROR";	
		} else {
			header('location:quiz.php');
			}
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Online Quiz</title>
	<link rel="stylesheet" href="library/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="library/fontawesome/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/style.css">
	<style>
		.b{
			background: url(images/bgtest1.jpg);
			background-repeat: no-repeat;
		}
		form{
			margin-top: 30%;
			background: rgba(50, 80, 80, 0.7)
		}
	</style>
</head>
<body class="b">
	 <div class="container mt-5 col-lg-4 col-md-6 col-sm-12">
	 	<form action="login.php" class="p-5 text-center"  
		method="post">
	 		<img src="images/user.png" class="my-3" style="width: 100px;height: 100px;line-height: -50px;">
	 		<div class="pt-2">
	 			<?php inputElement("fas fa-user","Username","text","Username","username"); ?>
	 		</div>
	 		<div class="pt-2">
	 			<?php inputElement("fas fa-key","Password","password","text & num at least 8 character..","pwd"); ?>
	 		</div>
	 		<div class="pt-2">
	 			<div class="row my-4">
	 				<div class="col ml-4">
	 					<button class="btn btn-outline-primary mb-3" id="btn-style" name ="submit" style="text-decoration: none;color: white;">Login</button>
	 				</div>
	 				<div class="col text-center">
	 					<a href="register.php" id="btn-style"  class="btn btn-outline-success" class="mx-0" style="text-decoration: none;color: white;">SignUp</a>
	 				</div>
	 			</div>
	 		</div>
	 	</form>
	 </div>
	
	<script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="library/bootstrap/popper.min.js"></script>
	<script src="library/bootstrap/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>