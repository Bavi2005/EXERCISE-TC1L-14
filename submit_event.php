<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

// Create connection
$data = mysqli_connect($host, $user, $password, $db);

// Check connection
if ($data === false) {
    die("Connection error");
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data_name = mysqli_real_escape_string($data, $_POST['name']);
    $data_student_id = mysqli_real_escape_string($data, $_POST['student_id']);
    $data_phone = mysqli_real_escape_string($data, $_POST['phone']);
    $data_event = mysqli_real_escape_string($data, $_POST['event']);
    $data_purpose = mysqli_real_escape_string($data, $_POST['purpose']);
    $data_details = mysqli_real_escape_string($data, $_POST['details']);

    // Insert query
    $sql = "INSERT INTO `event_application` (name, student_id, phone, event, purpose, details) VALUES ('$data_name', '$data_student_id', '$data_phone', '$data_event', '$data_purpose', '$data_details')";

    // Execute the query
    if (mysqli_query($data, $sql)) {
        echo "<script>alert('Application submitted successfully!'); window.location.href='event_application.php';</script>";
    } else {
        echo "Error: " . mysqli_error($data);
    }
}

// Close connection
mysqli_close($data);
?>
