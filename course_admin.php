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

if (isset($_POST['add_course'])) {
    $course_name = mysqli_real_escape_string($data, $_POST['course_name']);
    $course_code = mysqli_real_escape_string($data, $_POST['course_code']);
    $description = mysqli_real_escape_string($data, $_POST['description']);
    $semester = mysqli_real_escape_string($data, $_POST['semester']);
    $start_time = mysqli_real_escape_string($data, $_POST['start_time']);
    $end_time = mysqli_real_escape_string($data, $_POST['end_time']);
    
    $sql = "INSERT INTO courses (course_name, course_code, description, semester, start_time, end_time) 
            VALUES ('$course_name', '$course_code', '$description', '$semester', '$start_time', '$end_time')";

    if (mysqli_query($data, $sql)) {
        echo "<script>alert('Course added successfully');</script>";
    } else {
        echo "<script>alert('Failed to add course');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin - Add Course</title>
    <?php include 'admin_css.php'; ?>

    
    <!-- admin_css.php -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .content {
            padding: 40px;
            margin-left: 260px; /* Increased to push content further right */
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            width: 60%; /* Reduced width to make it smaller */
            margin-top: 40px;
            margin-bottom: 40px;
        }

        h1 {
            font-size: 28px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        label {
            font-size: 18px;
            color: #333;
            margin-bottom: 8px;
            align-self: flex-start;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        textarea {
            resize: none;
            height: 120px;
        }

        .btn {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .form-container {
            width: 60%;
            margin: 0 auto;
            padding: 20px;
        }

        .content input:focus, 
        .content textarea:focus {
            outline: none;
            border: 1px solid #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }

        @media (max-width: 768px) {
            .content {
                margin-left: 0;
                width: 90%;
            }

            .form-container {
                width: 100%;
            }
        }

        .button-container {
        text-align: center;
        margin-top: 20px;
        margin-left: 250px;
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
        <h1>Add a New Course</h1>

        <form action="course_admin.php" method="POST">
            <label>Course Name:</label>
            <input type="text" name="course_name" required><br><br>

            <label>Course Code:</label>
            <input type="text" name="course_code" required><br><br>

            <label>Description:</label>
            <textarea name="description" required></textarea><br><br>

            <label>Semester:</label>
            <input type="text" name="semester" required><br><br>

            <label>Start Time:</label>
            <input type="time" name="start_time" required><br><br>

            <label>End Time:</label>
            <input type="time" name="end_time" required><br><br>

            <input type="submit" name="add_course" value="Add Course" class="btn">
        </form>
    </div>

    <div class="button-container">
        <a href="adminhome.php" class="back-button">Back to Admin Dashboard</a>
    </div>

</body>
</html>
