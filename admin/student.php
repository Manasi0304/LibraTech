<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Information</title>
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
            padding-left: 900px;
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

        .sidenav a:hover {
          color: #f1f1f1;
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
    <!---------------sidenav-------->
      <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

      <a href="profile.php">Profile</a>
      <a href="books.php">Books</a>
      <a href="request.php">Book Request</a>
      <a href="issue_info.php">Issue Information</a>
    </div>

    <div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

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
    <!--__________________________search bar________________________-->

    <div class="srch">
        <form class="navbar-form" method="post" name="form1">
            
                <input class="form-control" type="text" name="search" placeholder="Student username.." required="">
                <button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
        </form>
    </div>

    <h2 style="margin-left:10px;font-weight:bold;">List Of Students</h2>
    <?php

        if(isset($_POST['submit']))
        {
            $q=mysqli_query($db,"SELECT first,last,username,prn,email,contact FROM `student` where username like '%$_POST[search]%' ");

            if(mysqli_num_rows($q)==0)
            {
                echo "Sorry! No student found with that username. Try searching again.";
            }
            else
            {
        echo "<table class='table table-bordered table-hover' >";
            echo "<tr style='background-color: #6db6b9e6;'>";
                //Table header
                echo "<th>"; echo "First Name";    echo "</th>";
                echo "<th>"; echo "Last Name";  echo "</th>";
                echo "<th>"; echo "Username";  echo "</th>";
                echo "<th>"; echo "PRN";  echo "</th>";
                echo "<th>"; echo "Email";  echo "</th>";
                echo "<th>"; echo "Contact";  echo "</th>";
                
            echo "</tr>";    

            while($row=mysqli_fetch_assoc($q))
            {
                echo "<tr>";
                echo "<td>"; echo $row['first']; echo "</td>";
                echo "<td>"; echo $row['last']; echo "</td>";
                echo "<td>"; echo $row['username']; echo "</td>";
                echo "<td>"; echo $row['prn']; echo "</td>";
                echo "<td>"; echo $row['email']; echo "</td>";
                echo "<td>"; echo $row['contact']; echo "</td>";

                echo "</tr>";
            }
        echo "</table>";
            }
        }
            /*if button is not pressed.*/
        else
        {
            $res=mysqli_query($db,"SELECT first,last,username,prn,email,contact FROM `student`;");

        echo "<table class='table table-bordered table-hover' >";
            echo "<tr style='background-color: #6db6b9e6;'>";
                //Table header
                echo "<th>"; echo "First Name";    echo "</th>";
                echo "<th>"; echo "Last Name";  echo "</th>";
                echo "<th>"; echo "Username";  echo "</th>";
                echo "<th>"; echo "PRN No";  echo "</th>";
                echo "<th>"; echo "Email";  echo "</th>";
                echo "<th>"; echo "Contact";  echo "</th>";
            echo "</tr>";    

            while($row=mysqli_fetch_assoc($res))
            {
                echo "<tr>";
                
                echo "<td>"; echo $row['first']; echo "</td>";
                echo "<td>"; echo $row['last']; echo "</td>";
                echo "<td>"; echo $row['username']; echo "</td>";
                echo "<td>"; echo $row['prn']; echo "</td>";
                echo "<td>"; echo $row['email']; echo "</td>";
                echo "<td>"; echo $row['contact']; echo "</td>";

                echo "</tr>";
            }
        echo "</table>";
        }

    ?>
</body>
</html>
