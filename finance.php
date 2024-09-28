<?php
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'admin') {
    header("location:login.php");
    exit;
}

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

// Fetch all payments from the database
$sql = "SELECT * FROM payments";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin - Finance</title>
    <?php include 'admin_css.php'; ?>
    <style>
        .content {
            margin-left: 260px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 80%;
        }

        h1 {
            font-size: 28px;
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        table th {
            background-color: #4CAF50;
            color: white;
            font-size: 18px;
        }

        table td {
            background-color: #f9f9f9;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        <h1>Student Payment History</h1>

        <table>
            <tr>
                <th>Student Name</th>
                <th>Student ID</th>
                <th>Amount (RM)</th>
                <th>Date Paid</th>
            </tr>

            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['student_name'] . "</td>";
                    echo "<td>" . $row['student_id'] . "</td>";
                    echo "<td>" . $row['amount'] . "</td>";
                    echo "<td>" . $row['payment_date'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No payments recorded</td></tr>";
            }
            ?>
        </table>
    </div>

</body>
</html>
