<?php
  include "navbar.php";
  include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
	
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
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

	<div class="wrapper">
		<h4>If you have any suggesions or questions please comment below.</h4>
		<br>
		<form style="" action="" method="post">
			<input class="form-control" type="text" name="comment" placeholder="Type your suggestion"><br>	
			<input class="btn btn-primary" type="submit" name="submit" value="Comment" style="width: 100px; height: 35px;">		
		</form>
	
<br><br>
	<div class="scroll">
		<?php
			if(isset($_POST['submit']))
			{
				$sql="INSERT INTO `comments` VALUES('','$_POST[comment]');";
				if(mysqli_query($db,$sql))
				{
					$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
					$res=mysqli_query($db,$q);

				echo "<table class='table table-bordered'>";
					while ($row=mysqli_fetch_assoc($res)) 
					{
						echo "<tr>";
							echo "<td>"; echo $row['comment']; echo "</td>";
						echo "</tr>";
					}
				echo "</table>";
				}

			}

			else
			{
				$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC"; 
					$res=mysqli_query($db,$q);

				echo "<table class='table table-bordered'>";
					while ($row=mysqli_fetch_assoc($res)) 
					{
						echo "<tr>";
							echo "<td>"; echo $row['comment']; echo "</td>";
						echo "</tr>";
					}
				echo "</table>";
			}
		?>
	</div>
	</div>
	
</body>
</html>
