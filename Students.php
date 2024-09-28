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

$host="localhost";
$user="root";
$password="";
$db="schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

// Fetch all users with the 'student' usertype
$sql = "SELECT * FROM user WHERE usertype='student'";
$result = mysqli_query($data, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student List</title>
    
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 50px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: skyblue;
        }

        .button-container 
        {
            text-align: center;
            margin-top: 20px;
            margin-left: 300px;

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
    
    <?php include 'admin_css.php'; ?>

</head>
<body>

    <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        <center>
            <h1>All Students</h1>

            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>

                <?php
                // Check if the query returned any rows
                if (mysqli_num_rows($result) > 0) {
                    // Output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No students found</td></tr>";
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

<?php
mysqli_close($data);
?>
