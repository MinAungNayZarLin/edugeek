<?php 
	//include_once 'header.php';
	include_once 'php/component.php';
	include_once 'database/config.php';
	include_once 'header.php';
	$errors = array('Uname' => '','email' => '','pwd' => '');
	$Uname = "";
	$email = "";
	$pwd = "";
	if(isset($_POST['submit'])){
		if(empty($_POST['Uname'])){
			$errors['Uname'] = "Username is empty.";
		}
		else{
			$Uname = $_POST["Uname"];
			if (!preg_match('/^[A-Za-z\\s]+$/',$Uname)) {
				$errors['Uname'] = "Username must be letter only";
			}
		}
		if(empty($_POST['email'])){
			$errors['email'] = "Email is empty.";
		}
		else{
			$email = $_POST["email"];
			if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				$errors['email'] = "email must be valide formate";
			}
		}
		if(empty($_POST['pwd'])){
			$errors['pwd'] = "Password is empty.";
		}
		else{
			$pwd = $_POST["pwd"];
			if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $pwd)) {
				$errors['pwd'] = "At least 8 or more character & number..."; 
			}
		}
		if (array_filter($errors)) {
			//echo "error in form.";
		}
		else{
			//save to db
			$Uname = mysqli_real_escape_string($conn,$_POST["Uname"]);
			$email = mysqli_real_escape_string($conn,$_POST["email"]);
			$pwd = mysqli_real_escape_string($conn,$_POST["pwd"]);
			
			$sql = "insert into userregisteration(username,email,password) values ('$Uname','$email','$pwd')";

			if(mysqli_query($conn,$sql)){
				header('location:login.php');
			}
			else{
				echo "query error".mysqli_error($conn);
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
	<link rel="stylesheet" href="library/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/style.css">
	<style>
		.b{
			background: url(images/bgtest.jpg);
			background-repeat: no-repeat;
		}
		form{
			margin-top: 30%;
			background: rgba(50, 80, 80, 0.7);
		}
	</style>
</head>
<body class="b">
	
	<div class="container mt-5 col-lg-4 col-md-6 col-sm-12">
		<form action="register.php" class="p-5 text-center"  
		method="post">
		<h2 class="font-q font-weight-bold text-center text-white">SignUp</h2>
			<div class="pt-2 mt-2">
				<?php inputElement("fas fa-user","Username","text","JohnSmith","Uname"); ?>
				<div class="text-danger my-3"><?php echo $errors['Uname']; ?></div>
			</div>
			<div class="pt-2">
				<?php inputElement("fas fa-envelope-open-text","Email","text","example@gmail.com","email"); ?>
				<div class="text-danger my-3"><?php echo $errors['email']; ?></div>
			</div>
			<div class="pt-2">
				<?php inputElement("fas fa-key","Password","password","number and character only","pwd"); ?>
				<div class="text-danger my-3"><?php echo $errors['pwd']; ?></div>
			</div>
			<div class="pt-2 wrapper ">
				<button id="signup" class="btn w-75 mt-3 text-white" name="submit">Sign Up</button>
			</div>
		</form>
	</div>

	<script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="library/bootstrap/popper.min.js"></script>
	<script src="library/bootstrap/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>