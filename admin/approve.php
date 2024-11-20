<?php
   include "connection.php";
   include "navbar.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Approve Request</title>
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
			height:400px;
			width:800px;
			background-color:black;
			opacity:0.6;
			color:white;
			border-radius:20px;
		}
		.Approve{
			margin:top:30px;
			margin-left:250px;
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
    <h3 style="text-align:center;margin-left:40px;">Approve Request</h3><br>

    <form class="Approve" action="" method="post" style="color: black;">
        <input class="form-control" type="text" name="approve" placeholder="Yes or No" required=""><br>
        <input class="form-control" type="text" name="issue" placeholder="Issue Date (yyyy-mm-dd)" required=""><br>
        <input class="form-control" type="text" name="return" placeholder="Return Date (yyyy-mm-dd)" required=""><br>

        <button class="btn btn-primary" type="submit" name="submit">Approve</button>
    </form>
</div>

<?php
    if(isset($_POST['submit'])){
    mysqli_query($db, "UPDATE `issue_book` SET `approve`='$_POST[approve]', `issue`='$_POST[issue]', `return`='$_POST[return]' WHERE `username`='$_SESSION[name]' and `bid`='$_SESSION[bid]';");

    mysqli_query($db, "UPDATE books SET quantity=quantity-1 where bid='$_SESSION[bid]';");

    $res = mysqli_query($db, "SELECT quantity from books where bid='$_SESSION[bid]';");
    while($row = mysqli_fetch_assoc($res)){
        if($row['quantity'] == 0){
            mysqli_query($db, "UPDATE books set status='not-available' where bid='$_SESSION[bid]';");
        }
    }
    ?>
    <script type="text/javascript">
        alert("Updated successfully");
        window.location="request.php";
    </script>
    <?php
}

  
?>
</body>
</html>
