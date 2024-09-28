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

if (isset($_POST['submit_payment'])) {
    $student_name = mysqli_real_escape_string($data, $_POST['student_name']);
    $student_id = mysqli_real_escape_string($data, $_POST['student_id']);
    $amount = mysqli_real_escape_string($data, $_POST['amount']);
    
    $_SESSION['payment_info'] = array(
        'student_name' => $student_name,
        'student_id' => $student_id,
        'amount' => $amount
    );
    
    header("location:fees_check.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student - Pay Fees</title>
    <?php include 'student_css.php'; ?>
    <style>
        .content {
            margin-left: 260px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 60%;
        }

        h1 {
            font-size: 28px;
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-size: 18px;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="number"] {
            width: 80%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
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
    </style>
</head>
<body>

    <?php include 'studenthome_sidebar.php'; ?>

    <div class="content">
        <h1>Pay Your Fees</h1>

        <form action="fees.php" method="POST">
            <label>Student Name:</label>
            <input type="text" name="student_name" required>

            <label>Student ID:</label>
            <input type="text" name="student_id" required>

            <label>Amount to Pay (RM):</label>
            <input type="number" name="amount" required>

            <input type="submit" name="submit_payment" value="Proceed to Payment" class="btn">
        </form>
    </div>

</body>
</html>
