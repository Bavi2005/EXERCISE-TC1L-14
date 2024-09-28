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

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="attendance_report.xls"');
header('Cache-Control: max-age=0');

// Output the headers for the Excel table
echo "Student Name\tDate\tStatus\n";

// Fetch attendance data and corresponding student usernames
$sql = "SELECT attendance.student_id, attendance.date, attendance.status, user.username 
        FROM attendance 
        JOIN user ON attendance.student_id = user.id 
        WHERE user.usertype = 'student'";
$result = mysqli_query($data, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $student_name = $row['username']; // Corrected to use 'username'
        $date = $row['date'];
        $status = ($row['status'] == 1) ? 'Present' : 'Absent';
        
        // Output each row in the Excel format
        echo "$student_name\t$date\t$status\n";
    }
} else {
    echo "No attendance data found.";
}

?>
