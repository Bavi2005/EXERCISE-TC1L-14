<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'student') {
    header("location:login.php");
    exit;
}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * FROM courses";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student - View Courses</title>
    <?php include 'student_css.php'; ?>
</head>
<body>

    <?php include 'studenthome_sidebar.php'; ?>

    <div class="content">
        <h1>Available Courses</h1>

        <table class="table">
            <tr>
                <th>Course Name</th>
                <th>Course Code</th>
                <th>Description</th>
                <th>Semester</th>
            </tr>

            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['course_name'] . "</td>";
                    echo "<td>" . $row['course_code'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['semester'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No courses available</td></tr>";
            }
            ?>
        </table>
    </div>

</body>
</html>
