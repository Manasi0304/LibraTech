<?php
 include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style type="text/css">
    	body{
    		background-image:url("images/feedback.png");
    		background-size:cover;
    		font-family: 'Roboto','sans-serif';

    		.wrapper{
    			padding:30px;
    			margin:50px 80px 100px 580px;
    			width:900px;
    			height:800px;
    			background-color:black;
    			opacity:0.8;
    			color:white;
    			border-radius:25px;

    		.form-control{
    			height:70px;
    			width:60%;

    		}
    		.scroll{
    			width:100%;
    			height:300px;
    			overflow:auto;
    		}

    		}
    	}
    </style>
</head>
<body>
	<header style="height:100px;">
		<div class="logo">
		  <img src="images/logo.png">
	   </div>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="books.php">Books</a></li>
				<li><a href="student_login.php">Student-LOGIN</a></li>
				<li><a href="registration.php">Registration</a></li>
				<li><a href="feedback.php">Feedback</a></li>
			</ul>
		</nav>
	</header>

	<div class="wrapper">
		<br>
		<h4> If you have any suggestions or questions please comment below</h4><br>
		<form style="" action="" method="post">
			<input class="form-control" type="text" name="comment" placeholder="Write your suggestion here"><br>
			<input class="btn btn-primary" type="submit" name="submit" value="Comment" style="width:100px; height:35px;"><br><br>
		</form>
	

	<div class="scroll">
		<?php
		if(isset($_POST['submit'])){
			$sql="INSERT INTO `comments` VALUES('','$_POST[comment]');";
			if(mysqli_query($db,$sql)){
				$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
				$res=mysqli_query($db,$q);

				echo"<table class='table table-bordered'>";
				while($row=mysqli_fetch_assoc($res)){
					echo"<tr>";
					  echo"<td>"; echo $row['comment']; echo"</td>";
					echo"</tr>";

				}

			}
		}
		else{
			$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
				$res=mysqli_query($db,$q);

				echo"<table class='table table-bordered'>";
				while($row=mysqli_fetch_assoc($res)){
					echo"<tr>";
					  echo"<td>"; echo $row['comment']; echo"</td>";
					echo"</tr>";

				}
		}

		?>
	</div>
</div>

</body>
</html>