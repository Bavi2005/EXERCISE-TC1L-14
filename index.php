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
                <div class="col-md-3 text-center">
                    <img class="icon" src="imc.png">
                    <h3 class="facility-title">Integrated Communication Tools</h3>
                    <p>Strengthen Connections Within Your School Community. Communication is the cornerstone of a successful educational environment. BJ-Escholer integrated communication tools ensure clear, consistent, and instant dialogue between teachers, students, and parents, fostering a collaborative community focused on student growth.</p>
                </div>

                <!-- Third Column -->
                <div class="col-md-3 text-center">
                    <img class="icon" src="rra.png">
                    <h3 class="facility-title">Robust Reporting and Analytics</h3>
                    <p>Data-Driven Strategies for School Excellence. Harness the power of data with BJ-Escholer advanced reporting and analytics. Make informed decisions based on comprehensive data analysis, enhancing academic programs, operational efficiency, and overall school performance.</p>
                </div>
            </div>
        </div>

        <div class="container facilities">
            <div class="row justify-content-between">
                <!-- Fourth Column -->
                <div class="col-md-3 text-center">
                    <img class="icon" src="fmt.png">
                    <h3 class="facility-title">Financial Management and Transparency</h3>
                    <p>Streamline Billing, Fees, and Financial Reporting. BJ-Escholer simplifies financial management for educational institutions. Our platform offers transparent tracking of billing, fees, and donations, coupled with detailed financial reports, ensuring fiscal responsibility and sustainability.</p>
                </div>

                <!-- Fifth Column -->
                <div class="col-md-3 text-center">
                    <img class="icon" src="cms.png">
                    <h3 class="facility-title">Customizable Modules and Scalability</h3>
                    <p>Tailor BJ-Escholer to Your School's Unique Needs. Every school is unique, and BJ-Escholer is designed to adapt. With customizable modules and scalable solutions, our system grows with your institution, ensuring you have the tools you need to succeed.</p>
                </div>

                <!-- Sixth Column -->
                <div class="col-md-3 text-center">
                    <img class="icon" src="fmr.jpg">
                    <h3 class="facility-title">Future-Ready Features</h3>
                    <p>Prepare your institution for the future with cutting-edge features and innovations that keep you ahead in the ever-evolving educational landscape.</p>
                </div>
            </div>
        </div>

    </div>

    <center>
        <h1>Contact Us</h1>
    </center>

    <div class="admission_form">
        <form action="data_check.php" method="POST">
            <div class="form-group">
                <label class="label_text">Name</label>
                <input class="input_deg" type="text" name="name">
            </div>

            <div class="form-group">
                <label class="label_text">Email</label>
                <input class="input_deg" type="text" name="email">
            </div>

            <div class="form-group">
                <label class="label_text">Phone</label>
                <input class="input_deg" type="text" name="phone">
            </div>

            <div class="form-group">
                <label class="label_text">Message</label>
                <textarea class="input_deg" name="message"></textarea>
            </div>

            <div class="form-group text-center">
                <input type="submit" value="Submit" name="submit" class="btn btn-primary center-btn">
            </div>
        </form>
    </div>



</body>
</html>

