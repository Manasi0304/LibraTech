<?php
   include "connection.php";
   include "navbar.php";
   session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Book Request</title>
 	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@1,800&family=Public+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@1,800&display=swap" rel="stylesheet">

    <style type="text/css">
		.srch
		{   
			margin-top:30px;
			padding-left: 1000px;
		}
		body {
		  font-family: 'Roboto', 'sans-serif';
		}

		.sidenav {
		  height: 100%;
		  margin-top:100px;
		  width: 0;
		  position: fixed;
		  z-index: 1;
		  top: 0;
		  left: 0;
		  background-color: #111;
		  overflow-x: hidden;
		  transition: 0.5s;
		  padding-top: 60px;
		}

		.sidenav a {
		  padding: 8px 8px 8px 32px;
		  text-decoration: none;
		  font-size: 25px;
		  color: #818181;
		  display: block;
		  transition: 0.3s;
		}

		.sidenav a:hover:not(.closebtn) {
		  color: #f1f1f1;
		  color: white;
		  width: 250px;
		  height: 60px;
		  background-color: #301934;
		}

		.sidenav .closebtn {
		  position: absolute;
		  top: 0;
		  right: 25px;
		  font-size: 36px;
		  margin-left: 50px;
		}

		@media screen and (max-height: 450px) {
		  .sidenav {padding-top: 15px;}
		  .sidenav a {font-size: 18px;}
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
 	<!---------------sidenav-------->
	  <div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

	  <a href="books.php">Books</a>
	  <a href="request.php">Book Request</a>
	  <a href="issue_info.php">Issue Information</a>
	</div>

	<div id="main">
	<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

	<script>
	  function openNav() {
	  document.getElementById("mySidenav").style.width = "250px";
	  document.getElementById("main").style.marginLeft = "250px";
	  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
	}

	   function closeNav() {
	   document.getElementById("mySidenav").style.width = "0";
	   document.getElementById("main").style.marginLeft = "0";
	   document.body.style.backgroundColor = "white";
    }

	</script>
	<?php
		  if(isset($_SESSION['login_user'])){
	  	$q=mysqli_query($db,"SELECT * FROM issue_book WHERE username='$_SESSION[login_user]' ;");
	  	if(mysqli_num_rows($q) == 0) {
    echo "<div style='margin: 10px;'>
    There's no pending request</div>";
}
	  	else{

		echo "<table class='table table-bordered table-hover'>";
		echo "<thead class='thead-dark'>"; 
		echo "<tr>";
		echo "<th>Book-ID</th>";
		echo "<th>Approve Status</th>";
		echo "<th>Issue Date</th>";
		echo "<th>Return Date</th>";
		echo "</tr>";
		echo "</thead>"; 

     while($row=mysqli_fetch_assoc($q)){
     	echo "<tr>";
     	echo "<td>"; echo $row['bid']; echo "</td>";
     	echo "<td>"; echo $row['approve']; echo "</td>";
     	echo "<td>"; echo $row['issue']; echo "</td>";
     	echo "<td>"; echo $row['return']; echo "</td>";
     	echo "</tr>";
     }
     echo "</table>";
	  	}
	  }
	  else{
	  	echo "</br><br></br>";
	  	echo "<h2><b>";
	  	echo "Please login first to see the request information";
	  	echo "</b></h2>";
	  }
      ?>

 </body>
 </html>