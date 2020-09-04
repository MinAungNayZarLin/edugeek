<?php 
  session_start();
  require_once 'database/config.php';
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
  <link rel="stylesheet" href="css/index.css">
  <link rel="short icon"  href="images/logo12.png">
</head>
<body>
	 <header class="">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background: #141a70;">
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
            <a class="nav-link mx-3" href="login.php">Quiz</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-3" href="contact-us.php">Contant Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-3" href="about.php">About Us</a>
          </li>
        </ul>
        <div class="f-right">
          <a href="login.php" class="btn btn-1 font-weight-bold">Login</a>
            <a href="register.php" class="btn btn-2 font-weight-bold">SignUp</a>
        </div>
        <a href="help.php"><span class="ml-3"><i class="far fa-question-circle text-red fa-2x"></i></span></a>

      </div>
    </nav>
  </header>