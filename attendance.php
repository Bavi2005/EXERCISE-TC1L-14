<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'admin') {
    header("location:login.php");
    exit;
}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit_attendance'])) {
    $date = mysqli_real_escape_string($data, $_POST['date']);
    $attendance_data = $_POST['attendance'];

    foreach ($attendance_data as $student_id => $status) {
        $sql = "INSERT INTO attendance (student_id, date, status) 
                VALUES ('$student_id', '$date', '$status')";
        mysqli_query($data, $sql);
    }
    echo "<script>alert('Attendance recorded successfully');</script>";
}

// Fetch students from the 'users' table where usertype is 'student'
// Update 'username' to the actual column name holding the student's name
$sql = "SELECT id, username FROM user WHERE usertype = 'student'";
$result = mysqli_query($data, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Attendance Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .content {
            margin: 50px auto;
            width: 60%;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .submit-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
        .download-btn {
            padding: 10px 20px;
            background-color: #1e90ff;
            color: white;
            border: none;
            cursor: pointer;
            margin-bottom: 20px;
        }
        .download-btn:hover {
            background-color: #0d74d4;
        }

        .button-container {
        text-align: center;
        margin-top: 20px;
        margin-left: 50px;
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

<div class="content">
    <h2>Attendance for Classes</h2>

    <form action="attendance.php" method="POST">
        <label for="date">Date:</label>
        <input type="date" name="date" required><br><br>

        <table>
            <tr>
                <th>Student Name</th>
                <th>Attendance</th>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['username'] . "</td>";  // Updated with the correct column name
                    echo "<td>
                            <select name='attendance[" . $row['id'] . "]'>
                                <option value='1'>Present</option>
                                <option value='0'>Absent</option>
                            </select>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No students found</td></tr>";
            }
            ?>
        </table>

        <input type="submit" name="submit_attendance" value="Submit Attendance" class="submit-btn">
    </form>

    <!-- Download attendance button -->
    <form action="download_attendance.php" method="POST">
        <button type="submit" class="download-btn">Download Attendance</button>
    </form>
</div>

<div class="button-container">
        <a href="adminhome.php" class="back-button">Back to Admin Dashboard</a>
</div>

</body>
</html>
