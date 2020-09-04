<?php 
	include_once 'header.php';
	include_once 'database/config.php';
 ?>
 <style>

 </style>
 <body class="bg-dark">
 <div class="container" style="margin-top: 100px;">
 	<h2 class="text-center text-white">Video :</h2>
 	<div class="row">
 		<?php 
 			$name = $_GET['name'];
 			$sql = "select * from c_video where CourseName='$name'";
 			$res = mysqli_query($conn,$sql);
 			$num = mysqli_num_rows($res);
 			if ($num>=1) {
 			
 			while ($row = mysqli_fetch_array($res)) {
 		 ?>
 		<div class="col-xl-5 col-lg-5 col-md-8 mt-5 mx-auto">
 			<video width="100%" height="70%" controls>
		  		<source src="Admin/<?php echo $row['file'] ?>" type="video/mp4">
			</video>
			<h6 class="text-white text-center"><?php echo $row['video_name']; ?></h6>
			<h6 class="text-white text-center"><?php echo $row['subject']; ?></h6>
			<hr>
 		</div>
 		<?php 
 				}
 			}
 			else{
 				echo "<h2 class=\"text-center text-white\">Tutorial haven't yet!  Coming soon.....</h2>";
 			}
 		 ?>
 	</div>
 </div>
 	<script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="library/bootstrap/popper.min.js"></script>
	<script src="library/bootstrap/bootstrap.min.js"></script>
	<script src="js/script.js"></script>