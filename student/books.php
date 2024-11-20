<?php
 include "connection.php";
 session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
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

	<!-----------search bar---------->
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="Search books" required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
		<form class="navbar-form" method="post" name="form1">			
				<input class="form-control" type="text" name="bid" placeholder="Enter Book ID" required="">
				<button style="background-color: #228B22; color: white; border: 1px solid #7DF9FF;" type="submit" name="submit1" class="btn btn-default">Request
				</button>
		</form>
	</div>
	</div>
	<h2 style="margin-left:20px;">List of Books</h2>
	<?php

	  if(isset($_POST['submit'])){
	  	$q=mysqli_query($db,"SELECT * FROM books WHERE name LIKE '%$_POST[search]%' ");
	  	if(mysqli_num_rows($q) == 0) {
    echo "<div style='margin: 10px;'>Sorry! No book found</div>";
}
	  	else{

		echo "<table class='table table-bordered table-hover'>";
		echo "<thead class='thead-dark'>"; 
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Book-Name</th>";
		echo "<th>Authors Name</th>";
		echo "<th>Edition</th>";
		echo "<th>Status</th>";
		echo "<th>Quantity</th>";
		echo "<th>Department</th>";
		echo "</tr>";
		echo "</thead>"; 

     while($row=mysqli_fetch_assoc($q)){
     	echo "<tr>";
     	echo "<td>"; echo $row['bid']; echo "</td>";
     	echo "<td>"; echo $row['name']; echo "</td>";
     	echo "<td>"; echo $row['authors']; echo "</td>";
     	echo "<td>"; echo $row['edition']; echo "</td>";
     	echo "<td>"; echo $row['status']; echo "</td>";
     	echo "<td>"; echo $row['quantity']; echo "</td>";
     	echo "<td>"; echo $row['department']; echo "</td>";
     	echo "</tr>";
     }
     echo "</table>";
	  	}
	  }
	  /*if button is not pressed*/

	  else{
	  	$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");

		echo "<table class='table table-bordered table-hover'>";
		echo "<thead class='thead-dark'>"; 
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Book-Name</th>";
		echo "<th>Authors Name</th>";
		echo "<th>Edition</th>";
		echo "<th>Status</th>";
		echo "<th>Quantity</th>";
		echo "<th>Department</th>";
		echo "</tr>";
		echo "</thead>"; 

     while($row=mysqli_fetch_assoc($res)){
     	echo "<tr>";
     	echo "<td>"; echo $row['bid']; echo "</td>";
     	echo "<td>"; echo $row['name']; echo "</td>";
     	echo "<td>"; echo $row['authors']; echo "</td>";
     	echo "<td>"; echo $row['edition']; echo "</td>";
     	echo "<td>"; echo $row['status']; echo "</td>";
     	echo "<td>"; echo $row['quantity']; echo "</td>";
     	echo "<td>"; echo $row['department']; echo "</td>";
     	echo "</tr>";
     }
     echo "</table>";

	  }

	  if(isset($_POST['submit1'])){
	  	if(isset($_SESSION['login_user'])){
            mysqli_query($db,"INSERT INTO `issue_book` VALUES('$_SESSION[login_user]','$_POST[bid]','','','') ");
            ?>
            <script type="text/javascript">
            	window.location="request.php"
            </script>
	  	}
	  	else{
	  		?>
	  		<script type="text/javascript">
	  			alert("You must login to Request a book");
	  		</script>

	  		<?php
	  	}
	  }

	
	?>
</body>
</html>