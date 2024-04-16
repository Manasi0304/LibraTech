<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
	<header style="height:100px;">
		<div class="logo">
		  <img src="images/logo.png">
	   </div>
	<nav>
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="">Books</a></li>
        <li><a href="student_login.html"> Student-LOGIN</a></li>
        <li><a href="registration.html">Registration</a></li>
        <li><a href="">Feedback</a></li>

    </ul>
    </nav>
 
	</header>
	<section>
		<div class="log_img">
		<br> <br>
		<div class="box1">
			<br>
			<h1 style="text-align:center;font-size:35px;font-weight:bold; color: white;">Library Management System</h1><br>
			<h1 style="text-align:center;font-size:20px;color: white;">User Login Form</h1><br>
			<form name="login" action="" method="">
			<div class="login">
				<input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
				<input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
				<input class="btn btn-primary" type="submit" name="submit" value="Login" style=" width:70px;height:40px;">
			</div>
			
			<p style="color:white; padding-left:15px; ">
				<br><br>
				<a style="color:white;"href="">Forgot password?</a>&nbsp &nbsp &nbsp &nbsp
				New to this website? &nbsp<a style="color:white;"href="registration.html">Sign Up</a>
			</p>
			</form>
		</div>

		</div>


	</section>

</body>
</html>