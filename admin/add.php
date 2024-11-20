<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
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
        .srch
        {   
            margin-top:30px;
            padding-left: 1000px;
        }
        body {
          background-color:#301934;
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

        .book{
        	width:400px;
        	margin:0px auto;
        }

        @media screen and (max-height: 450px) {
          .sidenav {padding-top: 15px;}
          .sidenav a {font-size: 18px;}
        }

        #main{
        	height:800px;
        }
   
        .container{
        	padding-top:40px;
        	padding-bottom:40px;
        	width:800px;
        	height:630px;
        	margin-top:40px;
        	border: 1px solid blue;
        }
        .form-control{
        	height:40px;
        }
    </style>
</head>
<body>

    <!--sidenav-->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <a href="profile.php">Add Books</a>
        <a href="books.php">Delete Books</a>
        <a href="#">Book Request</a>
        <a href="#">Issue Information</a>
    </div>

    <div id="main">
        <span style="font-size:30px;cursor:pointer;" onclick="openNav()">&#9776;</span>
        <div class="container">
        	<h2 style="color:white; font-weight:bold; text-align:center;"> Add New Books </h2><br>
        	<form class="book" action="" method="post" >
        		<input type="text" name="bid" class="form-control" placeholder="Book id"><br>
        		<input type="text" name="name" class="form-control" placeholder="Book Name" required=""><br>
        		<input type="text" name="authors" class="form-control" placeholder="Authors Name" required=""><br>
        		<input type="text" name="edition" class="form-control" placeholder="Edition" required=""><br>
        		<input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
        		<input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br>
        		<input type="text" name="department" class="form-control" placeholder="Department" required=""><br>
        		<button style="text-align:center;"class="btn btn-primary" type="submit" name="submit">Add</button>
        	</form>
        </div>
        <?php
            if(isset($_POST['submit'])){
            	if(isset($_SESSION['login_user'])){
            		mysqli_query($db,"INSERT INTO books VALUES('$_POST[bid]','$_POST[name]','$_POST[authors]','$_POST[edition]','$_POST[status]','$_POST[quantity]','$_POST[department]');");
            		?>
            		<script type="text/javascript">
            			alert("Book added successfully");
            		</script>
            		<?php

            	    }
            	    else{
            	    	?>
            	    	<script type="text/javascript">
            			alert("You need to login first");
            		    </script>
            	    	<?php
            	    }
                   }
        ?>
    </div>

    <script>
      function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
      document.body.style.backgroundColor = "#301934"; 
    }

       function closeNav() {
       document.getElementById("mySidenav").style.width = "0";
       document.getElementById("main").style.marginLeft = "0";
       document.body.style.backgroundColor = "#301934";
    }

    </script>
</body>
</html>


