<?php
session_start();

// Check if the user is logged in and their user type is 'admin'
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit;
}

// Redirect students (non-admins) back to login
elseif ($_SESSION['usertype'] != 'admin') {
    header("location:login.php");
    exit;
}

// Corrected database connection details
$host = "localhost";
$user = "root";        // Use 'root' for XAMPP by default
$password = "";        // Leave this blank if no password is set
$db = "schoolproject"; // Your database name

// Establish the database connection
$data = mysqli_connect($host, $user, $password, $db);

// Check if the connection is successful
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to select data from the 'contact us' table
$sql = "SELECT * FROM `contact us`";
$result = mysqli_query($data, $sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Dashboard</title>

        <?php include 'admin_css.php'; ?>

        <style>
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

        <div class="content">
            <center>
            <h1>Contact Us Form Database</h1>

            <table border="2px" style="border-collapse: collapse;">
                <tr>
                    <th style="padding: 20px; font-size: 15px; border: 1px solid black;">Name</th>
                    <th style="padding: 20px; font-size: 15px; border: 1px solid black;">Email</th>
                    <th style="padding: 20px; font-size: 15px; border: 1px solid black;">Phone</th>
                    <th style="padding: 20px; font-size: 15px; border: 1px solid black;">Message</th>
                </tr>

                <?php
                // Fetching data from the query result and displaying it in the table
                while($info = $result->fetch_assoc()) {
                ?>

                <tr>
                    <td style="padding: 20px; border: 1px solid black;">
                        <?php echo "{$info['name']}"; ?>
                    </td>
                    <td style="padding: 20px; border: 1px solid black;">
                        <?php echo "{$info['email']}"; ?>
                    </td>
                    <td style="padding: 20px; border: 1px solid black;">
                        <?php echo "{$info['Phone']}"; ?>
                    </td>
                    <td style="padding: 20px; border: 1px solid black;">
                        <?php echo "{$info['Message']}"; ?>
                    </td>
                </tr>

                <?php
                }
                ?>
            </table>
            </center>
        </div>

        <div class="button-container">
        <a href="adminhome.php" class="back-button">Back to Admin Dashboard</a>
        </div>

    </body>
</html>
