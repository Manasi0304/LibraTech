<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Online Library Management System
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@1,800&family=Public+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@1,800&display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper">

<header>
    <div class="logo">
    <a href="first_page.php"><img src="images/logo.png" alt="Logo"></a>
    </div>
    <?php
        if(isset($_SESSION['login_user'])) { 
    ?>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="books.php">Books</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="registration.php">Registration</a></li>
            <li><a href="feedback.php">Feedback</a></li>
        </ul>
    </nav>
    <?php
        } else {
    ?>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="books.php">Books</a></li>
            <li><a href="student_login.php">Student-LOGIN</a></li>
            <li><a href="registration.php">Registration</a></li>
            <li><a href="feedback.php">Feedback</a></li>
        </ul>
    </nav>
    <?php
        }
    ?>
</header>
<section>
    <div class="sec_img">
    <br><br><br>
    <div class="box">
        <br>
        <h1 style="text-align:center;font-size:45px;font-weight:bold;">Welcome to Library</h1><br><br>
        <h1 style="text-align:center;font-size:20px;color:yellow;">"Library is a hospital for mind"</h1><br>
    </div>
    </div>
</section>
</div>
<?php
    include "footer.php";
?>
</body>
</html>
