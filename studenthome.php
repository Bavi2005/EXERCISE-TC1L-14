<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit;
} elseif ($_SESSION['usertype'] == 'admin') {
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>

    <?php include 'student_css.php'; ?>

    <style>
        .widget {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .widget h2 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .widget-link {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        .widget-link:hover {
            text-decoration: underline;
        }

        .content {
            padding: 20px;
        }
    </style>
</head>
<body>

    <?php include 'studenthome_sidebar.php'; ?>

    <div class="content">
        <h1>Welcome to Your Student Dashboard</h1>

        <div class="dashboard-widgets">
            <!-- Widget for Class Timetable -->
            <div class="widget">
                <h2>Your Classes</h2>
                <p>Track your class timetable and their statuses. Stay updated with <strong>Your class timing</strong>.</p>
                <a href="#" class="widget-link">View My Timetable</a>
            </div>

            <!-- Widget for Health & Performance -->
            <div class="widget">
                <h2>Health & Performance</h2>
                <p>Keep an eye on your academic progress and health. Your latest BMI reading is: <strong>Check it here</strong>.</p>
                <a href="health.php" class="widget-link">Check Health Stats</a>
            </div>

            <!-- Motivational Quote -->
            <div class="widget">
                <h2>Motivation</h2>
                <p><em>"Success is not final, failure is not fatal: It is the courage to continue that counts."</em> – Winston Churchill</p>
            </div>
        </div>

        <div class="student-summary">
            <h2>Quick Tips</h2>
            <p>Use the sidebar to access event submissions, track your performance, and connect with the student community.</p>
        </div>
    </div>

</body>
</html>
