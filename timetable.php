<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT course_name, course_code, semester, start_time, end_time FROM courses";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student - Timetable</title>
    <?php include 'student_css.php'; ?>
    <style>
        .timetable {
            width: 100%;
            border-collapse: collapse;
            margin-top: 40px;
        }

        .timetable th, .timetable td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        .timetable th {
            background-color: #4CAF50;
            color: black;
            font-size: 18px;
        }

        .timetable td {
            background-color: #f9f9f9;
            font-size: 16px;
        }

        .course-slot {
            background-color: #1e90ff;
            color: black;
            border-radius: 8px;
            padding: 10px;
            transition: transform 0.3s ease;
        }

        .course-slot:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <?php include 'studenthome_sidebar.php'; ?>

    <div class="content">
        <h1>Your Timetable</h1>

        <table class="timetable">
            <tr>
                <th>Course Name</th>
                <th>Course Code</th>
                <th>Semester</th>
                <th>Start Time</th>
                <th>End Time</th>
            </tr>

            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td class='course-slot'>" . $row['course_name'] . "</td>";
                    echo "<td>" . $row['course_code'] . "</td>";
                    echo "<td>" . $row['semester'] . "</td>";
                    echo "<td>" . date("h:i A", strtotime($row['start_time'])) . "</td>";
                    echo "<td>" . date("h:i A", strtotime($row['end_time'])) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No courses available</td></tr>";
            }
            ?>
        </table>
    </div>

</body>
</html>
