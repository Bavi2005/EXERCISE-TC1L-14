<?php
session_start();

// Include database connection file
include 'db_connect.php';  // Ensure the file path is correct

// Check if the form has been submitted
if (isset($_POST['name']) && isset($_POST['height']) && isset($_POST['weight']) && isset($_POST['height_unit'])) {
    $name = $_POST['name'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $height_unit = $_POST['height_unit'];

    // Convert height to meters if necessary
    if ($height_unit == 'cm') {
        $height_in_meters = $height / 100;
    } else {
        $height_in_meters = $height;
    }

    // Calculate BMI
    $bmi = round($weight / pow($height_in_meters, 2), 2);

    // Determine BMI category
    if ($bmi < 18.5) {
        $bmi_category = 'Underweight';
    } elseif ($bmi < 25) {
        $bmi_category = 'Normal weight';
    } elseif ($bmi < 30) {
        $bmi_category = 'Overweight';
    } else {
        $bmi_category = 'Obese';
    }

    // Insert the data into the database
    $sql = "INSERT INTO health_data (name, height, weight, bmi, height_unit, bmi_category) 
            VALUES ('$name', '$height', '$weight', '$bmi', '$height_unit', '$bmi_category')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "BMI calculated and data stored successfully!";
    } else {
        $_SESSION['message'] = "Error storing data: " . mysqli_error($conn);
    }

    // Redirect back to the form
    header('Location: health.php');
    exit;
} else {
    $_SESSION['message'] = "Error: Please fill in all the fields.";
    header('Location: health.php');
    exit;
}
?>
