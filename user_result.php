<?php 
	include_once 'database/config.php';
	  session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>eduGEEK</title>
  <link rel="stylesheet" href="library/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="library/fontawesome/fontawesome-all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="short icon"  href="images/logo12.png">
</head>
<style>
  .bg-navy{
      background: #000080;
  }
  .btn-1{
    background: #FFC300;
  }
  .btn-2{
    background: #FF5733;
  }
  .text-red{
    color: #FF0707;
  }
  header .navbar-nav .nav-item .nav-link {
  color: #ffffff;
  font-weight: bold;
  text-decoration: none;
}
header .navbar-nav .nav-item .nav-link:hover {
  color: red;
}
</style>
<body>
     <header class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light" style="background: #141a70;">
       <button class="navbar-toggler bg-white type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03">
            <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="images/logo.png"><b class="text-white">eduGEEK</b></a>

      <div class="collapse navbar-collapse mx-5" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 mx-5">
          <li class="nav-item">
            <a class="nav-link mx-3" href="learning.php">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-3" href="quiz.php">Quiz</a>
          </li>
         <li class="nav-item">
            <a class="nav-link mx-3" href="user_result.php">Result</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-3" href="about.php">About Us</a>
          </li>
        </ul>
        <span class="ml-3"><i class="far fa-question-circle text-red fa-2x"></i></span>
      </div>
    </nav>
    <div class="text-danger text-center" id="display"></div>
  </header>
 	<table class="table table-striped w-50 mx-auto" style="margin-top: 100px;">
 		<thead>
 			<tr>
 				<th>No</th>
 				<th>Username</th>
 				<th>Subject</th>
 				<th>Total Questions</th>
 				<th>Scores</th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php 
 				$username = $_SESSION["user"];
 				$sql = "Select * from result where username = '$username'";
 				$res = mysqli_query($conn,$sql);
 				while($rows = mysqli_fetch_array($res)){
 			 ?>
 			<tr>
 				<td><?php echo $rows["no"]; ?></td>
 				<td><?php echo $rows["username"]; ?></td>
 				<td><?php echo $rows["subject"]; ?></td>
 				<td><?php echo $rows["ques_count"]; ?></td>
 				<td><?php echo $rows["score"]; ?></td>
 			<?php 
 				}
 			 ?>
 		</tbody>
 	</table>
  <script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
  <script src="library/bootstrap/popper.min.js"></script>
  <script src="library/bootstrap/bootstrap.min.js"></script>
  <script src="js/script.js"></script>