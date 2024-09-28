<?php
session_start();

// Check if the user is logged in and their user type is 'admin'
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit;
} elseif ($_SESSION['usertype'] != 'admin') {
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <?php include 'admin_css.php'; ?>

    
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
        padding: 30px;
        margin-left: 250px; /* add a margin to the left */
        }

    </style>
</head>
<body>

    <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        <h1>Welcome to the Admin Dashboard</h1>

        <div class="dashboard-widgets">
            <!-- Widget for Student Stats add student here -->
            <div class="widget">
                <h2>Student Overview</h2>
                <p>Manage all registered students. Currently, there are <strong>X students</strong> in the system.</p>
                <a href="manage_students.php" class="widget-link">Manage Students</a>
            </div>

            <!-- Widget for Event Management -->
            <div class="widget">
                <h2>Event Applications</h2>
                <p>Review and approve event applications submitted by students. There are <strong>X pending applications</strong>.</p>
                <a href="event_admin.php" class="widget-link">View Applications</a>
            </div>

            <!-- Widget for Motivational Message -->
            <div class="widget">
                <h2>Leadership Quote</h2>
                <p><em>"Leadership is the capacity to translate vision into reality."</em> – Warren Bennis</p>
            </div>
        </div>

        <div class="admin-summary">
            <h2>Quick Actions</h2>
            <p>Use the sidebar to navigate through different management sections such as student records, event approvals, and more.</p>
        </div>
    </div>

</body>
</html>
