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
@media screen and (min-width: 360px) {
  .size{
    font-size: 15px;
  }
  .q{
    font-size: 18px;
  }
}
@media screen and (min-width: 550px) {
  .size{
    font-size: 20px;
  }
  .q{
    font-size: 22px;
  }
}
@media screen and (min-width: 1080px) {
  .size{
    font-size: 23px;
  }
}
</style>
<body>
  <header class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light" style="background: #141a70;">
       <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03">
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
            <a class="nav-link mx-3" href="#about">About Us</a>
          </li>
        </ul>
      </nav>
      <div class="text-danger text-center" id="display"></div>
  </header>

	<div class="container-fluid"  style="margin-top: 100px;">
		<div class="col-md-10 col-xl-6 col-sm- my-5 m-auto";>
			<form action="result.php" method="post">
					<div class="card bg-light p-3" id="quiz">
					<?php
						if (isset($_GET['id'])) {
						$id = mysqli_real_escape_string($conn,$_GET['id']);
						$sql = "select * from module where id = $id";
    					$res = mysqli_query($conn,$sql);
    					$cname = mysqli_fetch_array($res);
    					$catagory = $cname['name'];
    					$time = $cname['time'];
    					@$_SESSION["Catagory"] = $catagory;
 						$fetchqry = "SELECT * FROM question where catagory = '$catagory'";
						$result=mysqli_query($conn,$fetchqry);
						$num=mysqli_num_rows($result);
				
			   			while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		 				 ?>
					
					<div class="card-header">
						<h3 class="q"><?php echo @$snr +=1;?>&nbsp;&nbsp;<?php echo @$row['q'];?></h3>
					</div>
					
					<div class="card-body"> 
 						<h4 class="size">a )<input required type="radio" class="mx-3" name="<?php echo $snr;?>" value="<?php echo $row['option_1'];?>"><?php echo $row['option_1']; ?></h4>
 						<h4 class="size">b )<input required type="radio" class="mx-3" name="<?php echo $snr;?>" value="<?php echo $row['option_2'];?>"><?php echo $row['option_2']; ?></h4>
 						<h4 class="size">c )<input required type="radio" class="mx-3" name="<?php echo $snr;?>" value="<?php echo $row['option_3'];?>"><?php echo $row['option_3']; ?></h4>
 						<h4 class="size">d )<input required type="radio" class="mx-3" name="<?php echo $snr;?>" value="<?php echo $row['option_4'];?>"><?php echo $row['option_4']; ?></h4>
					</div>

					<?php 
						}
						//var_dump($_SESSION["score"]);
					} ?>
					<div class="card-footer">
						<button class="btn btn-info" id="btn" name="submit">Submit Quiz</button>
					</div>
				</div>
			</form>

		</div>
	</div>
	<script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="library/bootstrap/popper.min.js"></script>
	<script src="library/bootstrap/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
	<script>
		function CountDown(duration, display) {
            if (!isNaN(duration)) {
                var timer = duration, minutes, seconds;
                
              var interVal=  setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    $(display).html("<b>" + minutes + "m : " + seconds + "s" + "</b>");
                    if (--timer < 0) {
                        timer = duration;
                       SubmitFunction();
                       $('#btn').empty();
                       clearInterval(interVal)
                    }
                    },1000);
            }
        }
        function SubmitFunction(){
       	$('form').submit();
        }
         CountDown(<?php echo $time*60; ?>,$('#display'));
	</script>
</body>
</html>