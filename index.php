<?php

    error_reporting(0);
    session_start();
    session_destroy();

    if ($_SESSION['message'])
    {
        $message=$_SESSION['message'];

        echo "<script type='text/javascript'>
        
        alert('$message');
            
            </script>";
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Management System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <nav>
        <label class="logo">BJ-Escholer</label>
        <ul>
            <li><a href="">Product</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Pricing</a></li>
            <li><a href="">Facilities</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>

    <div class="section1">
        <img class="main_img" src="backgroundpic.jpg">
    </div>

    <div class="container welcome-section">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome_img" src="schoolmanagement.png">
            </div>
            <div class="col-md-8">
                <h1>Welcome to BJ-Escholer</h1>
                <p> This learning management system will be topping the charts as the best rated School Management System in the future.
                    I present you the School Management System where everything is located.
                    BJ-Escholer School Management System aims to facilitate management processes,
                     improve the organization of education activities, and promote an active learning environment. 
                     BJ-Escholer is an SMS that follows everyday practices and assists schools, colleges, universities, 
                     and other institutions in fulfilling the need for modern classrooms to help administrators,
                      teachers and learners succeed effectively and happily. </p>

            </div>
        </div>

        <center>
            <h1>Our Facilities</h1>
        </center>

        <div class="container facilities">
            <div class="row justify-content-between">
                <!-- First Column -->
                <div class="col-md-3 text-center">
                    <img class="icon" src="education.jpg">
                    <h3 class="facility-title">Real-Time Academic Tracking</h3>
                    <p>Monitor, Support, and Celebrate Student Achievement. With BJ-Escholer, tracking academic progress is seamless. Our intuitive dashboards provide real-time insights into student performance, attendance, and behavior, enabling timely interventions and personalized support, thus driving student achievement to new heights.</p>
                </div>

                <!-- Second Column -->
