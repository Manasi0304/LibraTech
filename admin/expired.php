<?php
   include "connection.php";
   include "navbar.php";
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
			padding-left:800px;
		}
		.form-control{
			width:300px;
			height:40px;
			background-color:black;
			color:white;		}
		body {
		  font-family: 'Roboto', 'sans-serif';
		  background-image:url("images/request.png");
		  background-size:cover;
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

	

		.container{
			padding:30px;
			height:700px;
			background-color:black;
			opacity:0.6;
			color:white;
			border-radius:20px;
		}
		.scroll{
			width:100%;
			height:500px;
			overflow:auto;
		}
		}
	</style>
 </head>
 <body>
 	<!---------------sidenav-------->
	  <div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

	  <a href="books.php">Books</a>
	  <a href="request.php">Book Request</a>
	  <a href="issue_info.php">Issue Information</a>
	  <a href="expired.php">Expired</a>
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
	<div class="container">
		
		<?php

		  if(isset($_SESSION['login_user'])){
		  	?>
		  	<div style="float:left; padding:15px;">
		 <button style="background-color: #228B22; color: white; border: 1px solid #7DF9FF;" type="submit" name="submit1" class="btn btn-default">Returned</button>&nbsp &nbsp
		 <button style="background-color: #900C3F; color: white; border: 1px solid red;" type="submit" name="submit1" class="btn btn-default">Expired</button></div>

			<form class="srch" method="post" action="" name="form1">
				<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
				<input type="text" name="bid" class="form-control" placeholder="BID" required=""><br>
				<button class="btn btn-primary" name="submit" type="submit">Submit</button><br>

			</form>

		  	<?php
		  	if(isset($_POST['submit'])){

		  		$res=mysqli_query($db,"SELECT * FROM `issue_book` where username='$_POST[username]' and bid ='$_POST[bid]';");
		  		while($row=mysqli_fetch_assoc($res)){
		  			$d = strtotime($row['return']);
		  			$c = strtotime(date("Y-m-d"));
		  			$diff= $c-$d;
		  			if($diff>=0){
		  				$day= floor($diff/(60*60*24));
		  				$fine=$day*10;
		  			}
		  	}
		  		$x= date("Y-m-d");
		  		mysqli_query($db,"INSERT INTO `fine` VALUES('$_POST[username]','$_POST[bid]','$x','$day','$fine','not paid');");

		  		$var1='<p style="background-color:#48C955;">Returned</p>';
		  		mysqli_query($db,"UPDATE issue_book SET approve='Expired' where username='$_POST[username]' and bid='$_POST[bid]';");

		  	}
		  }
		?>
		<h3 style="text-align:center;"> Date expired list</h3>
		<?php
		$c=0;
		if(isset($_SESSION['login_user']))
		{
			$var='<p style="background-color:#D22B2B;">Expired</p>';
			$sql="SELECT student.username,prn,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve !='' and issue_book.approve !='Yes' ORDER BY `issue_book`.`return` ASC";
			$res=mysqli_query($db,$sql);

			echo "<br>";
			
            echo "<table class='table table-bordered'>";
            echo "<tr style='background-color: #6db6b9e6; '>";
            echo "<th style='color: white;'>Username</th>";
            echo "<th style='color: white;'>PRN No</th>";
            echo "<th style='color: white;'>BID</th>";
            echo "<th style='color: white;'>Book Name</th>";
            echo "<th style='color: white;'>Authors Name</th>";
            echo "<th style='color: white;'>Edition</th>";
            echo "<th style='color: white;'>Status</th>";
            echo "<th style='color: white;'>Issue Date</th>";
            echo "<th style='color: white;'>Return Date</th>";
            echo "</tr>";
            echo "</table";

            echo"<div class='scroll'>";
            while($row=mysqli_fetch_assoc($res)){
            	
                echo "<tr>";
                echo "<td>"; echo $row['username']; echo "</td>";
                echo "<td>"; echo $row['prn']; echo "</td>";
                echo "<td>"; echo $row['bid']; echo "</td>";
                echo "<td>"; echo $row['name']; echo "</td>";
                echo "<td>"; echo $row['authors']; echo "</td>";
                echo "<td>"; echo $row['edition']; echo "</td>";
                echo "<td>"; echo $row['approve']; echo "</td>";
                echo "<td>"; echo $row['issue']; echo "</td>";
                echo "<td>"; echo $row['return']; echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
		}
		else{
			?>
			<h3 style="text-align:center;"> Login to see information of borrowed Books</h3>

			<?php
		}
		?>
	</div>
</div>
</body>
</html>

