<?php
   include "connection.php";
   include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@1,800&family=Public+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@1,800&display=swap" rel="stylesheet">
  

	<style type="text/css">
		  *{
             font-family: 'Roboto','sans-serif';
            }
		body{
			height:700px;
			background-image:url(images/update_password.png);
			background-size: cover;
		}
		.wrapper{
			width:600px;
			height:520px;
			margin:80px auto;
			background-color:black;
			opacity:0.7;
			border-radius:30px;
			color:white;
			padding-top:30px;
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
		<div style="text-align:center;">
		 <h1 style="text-align: center; font-size: 35px;">Library Management System</h1>
		 <h1 style="text-align: center; font-size: 25px;">Change your Password</h1><br><br>
		</div>

		<form action="" method="post">
			<input style="width:500px;height:40px;margin-left:40px;" type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input style="width:500px;height:40px;margin-left:40px;"type="text" name="email" class="form-control" placeholder="Email" required=""><br>
			<input style="width:500px;height:40px;margin-left:40px;"type="text" name="password" class="form-control" placeholder="New Password" required=""><br>
			<button style="width:80px;height:40px;margin-left:40px;" class="btn btn-primary" type="submit" name="submit">Update</button>

		</form>

	</div>
	<?php
	  if(isset($_POST['submit']))
	  {
	  	 if(mysqli_query($db,"UPDATE student SET password='$_POST[password]' WHERE username='$_POST[username]' AND email='$_POST[email]';")){
	  	 	?>
	  	 	<script type="text/javascript">
	  	 	    alert("The password updated successfully");
	  	 	    setTimeout(function() {
                var alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                alert.style.display = 'none';
            });
        }, 3000);
	  	 	</script>
	  	 	<?php
	  	 }
	  }

	?>

</body>
</html>