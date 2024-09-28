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
