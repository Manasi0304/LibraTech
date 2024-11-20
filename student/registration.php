<?php
 include "connection.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Student Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            if (password.length < 8) {
                alert("Password must be at least 8 characters long");
                return false; 
            }
            return true;
        }
    </script>



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

	<section>
		<div class="reg_img">
			<br> <br><br>
		<div class="box2">
			<h1 style="text-align:center;font-size:35px;font-weight:bold; color: white;">Library Management System</h1><br>
			<h1 style="text-align:center;font-size:20px;">User Registration Form</h1>
			<form name="Registration" action="" method="post" onsubmit="return validatePassword()">
			<div class="login">
				<input class="form-control" type="text" name="first" placeholder="First Name" required=""><br>
				<input class="form-control" type="text" name="last" placeholder="Last Name" required=""><br>
				<input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
				<input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
				<input class="form-control" type="text" name="prn" placeholder="PRN No" required=""><br>
				<input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
				<input class="form-control" type="text" name="contact" placeholder="Phone No" required=""><br>
				<input class="btn btn-primary" type="submit" name="submit" value="Register" style=" width:90px;height:40px;">
			</div>
			</form>

		</div>
		</div>
	</section>

	<?php

	 if(isset($_POST['submit'])){

	 $count=0;
	 $sql="SELECT username from student";
	 $res=mysqli_query($db,$sql);

	 while($row=mysqli_fetch_assoc($res)){
	  if($row['username'] == $_POST['username'])
	  {
	  	$count=$count+1;
	  }
	}

	if($count==0){
	 mysqli_query($db,"INSERT INTO `STUDENT` VALUES('$_POST[first]','$_POST[last]','$_POST[username]','$_POST[password]','$_POST[prn]','$_POST[email]','$_POST[contact]','profile.png');");
	

 ?>
   <script type="text/javascript">
    window.onload = function() {
        alert("Registration successful");
    };
</script>


 <?php
}
   else{
   ?>
       <script type="text/javascript">
    window.onload = function() {
        alert("The username alredy exist");
    };
    </script>
    <?php

     }
	}

	?>
</body>
</html>