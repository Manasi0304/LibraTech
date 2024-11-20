<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Online Library Management System</title>
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

 
</style>
</head>
<body>

    <header style="height:100px;">
        <div class="logo">
            <img src="images/logo.png">
        </div>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand active">Library Management System</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="books.php">Books</a></li>
                    <li><a href="feedback.php">Feedback</a></li>
                    <?php
                        if(isset($_SESSION['login_user']))
                        {?>
                            <li style="color:orange;"><a href="student.php">Student-Information</a></li>
                            <li style="color:orange;"><a href="fine.php">Fines</a></li>
                        <?php
                        }
                    ?>
                </ul>
                <?php
                    if(isset($_SESSION['login_user']))
                    {?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="">
                                <div style="color: white">                                   
                                    <?php
                                        if(isset($_SESSION['pic']) && !empty($_SESSION['pic'])) {
                                            echo "<img class='img-circle profile_img' height=30 width= 30 src='images/".$_SESSION['pic']."'>";
                                        } else {
                                            // Provide a default image source if $_SESSION['pic'] is not set or empty
                                            echo "<img class='img-circle profile_img' height=30 width= 30 src='images/profile.png'>";
                                        }

                                        echo " <span style='color: yellow;'>".$_SESSION['login_user']."</span>";


                                       /* echo "<img class='img-circle profile_img' src='images/".$_SESSION['pic']."'>";
                                        echo $_SESSION['login_user'];
                                        */
                                    ?>
                                </div>
                            </a></li>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out" style="margin-right: 5px;"></span> Logout</a></li>
                        </ul>
                    <?php
                    }
                    else
                    {   ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="admin_login.php"><span class="glyphicon glyphicon-log-in" style="margin-right: 0px;"></span> Login</a></li>
                            <li><a href="registration.php"><span class="glyphicon glyphicon-user" style="margin-right: 0px;"></span> SignUp</a></li>
                        </ul>
                    <?php
                    }
                ?>
            </div>
        </nav>
    </header>

</body>
</html>
