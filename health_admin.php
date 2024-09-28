<?php
session_start();

// Database connection parameters
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

// Create connection
$conn = mysqli_connect($host, $user, $password, $db);

// Check connection
if ($conn === false) {
    die("Connection error: " . mysqli_connect_error());
}

// Fetch health data
$sql = "SELECT * FROM `health_data`";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Data - Admin</title>

    <?php include 'admin_css.php'; ?>

    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }

    h2 {
        text-align: center;
        color: #333;
        margin-top: 20px;
    }

    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        margin-left: 250px;
    }

    th, td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #1e90ff;
        color: white;
        text-transform: uppercase;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .button-container {
        text-align: center;
        margin-top: 20px;
    }

    .back-button {
        padding: 10px 20px;
        background-color: #1e90ff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .back-button:hover {
        background-color: #0d74d4;
    }

    </style>
</head>
<body>

    <?php include 'admin_sidebar.php'; ?>

    <h2>Health Data</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Height</th>
            <th>Weight</th>
            <th>BMI</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['height']) . "</td>";
                echo "<td>" . htmlspecialchars($row['weight']) . "</td>";
                echo "<td>" . htmlspecialchars($row['bmi']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' style='text-align: center;'>No data found</td></tr>";
        }
        ?>
    </table>

    <div class="button-container">
        <a href="adminhome.php" class="back-button">Back to Admin Dashboard</a>
    </div>

    <?php
    // Close connection
    mysqli_close($conn);
    ?>
</body>
</html>
