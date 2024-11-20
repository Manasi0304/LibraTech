<?php
   include "connection.php";
   session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style type="text/css">

*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Roboto','sans-serif';
}

.container{
    width: 100%;
    height: 100vh;
    background-color: rgba(0,0,0,0.4);
    display: flex;
    align-items: center;
    justify-content: center;
}

.content{
    text-align: center;
}

.content h1{
    font-size: 95px;
    color: #fff;
    margin-bottom: 50px;
}

.content a{
    font-size: 23px;
    color: #fff;
    text-decoration: none;
    border: 2px solid #fff;
    padding: 15px 25px;
    border-radius: 50px;
    transition: 0.3s;
}

.content a:hover{
    background-color: #fff;
    color: #000;
}

.background-clip{
    position: absolute;
    right: 0;
    bottom: 0;
    z-index: -1;
    background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.9) 100%);
}

@media (min-aspect-ratio:16/9) {
    .background-clip{
        width: 100%;
        height: auto;
    }
}

@media (max-aspect-ratio:16/9) {
    .background-clip{
        width: auto;
        height: 100%;
    }
}

    </style>
    <title>Library Management System</title>
</head>
<body>
    
    <div class="container">

        <video autoplay loop muted plays-inline class="background-clip">
            <source src="images/video.mp4" type="video/mp4">
        </video>

        <div class="content">
            <h1>Library Management System</h1>
            <a href="index.php">Explore</a>
        </div>
    </div>

</body>
</html>