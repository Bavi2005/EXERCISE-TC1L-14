<?php
session_start();
include 'db_connect.php';  // Database connection

// Variables to store the BMI and category
$bmi = '';
$bmi_category = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    if (!mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Error storing data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI CALCULATOR</title>
    <link rel="stylesheet" href="student.css">
    <?php include 'studentevent_css.php'; ?>
    
    <style>
    /* General styles */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f0f4f8;
        margin: 0;
        padding: 0;
    }

    h1 {
        color: #4A90E2;
        font-size: 36px;
        text-align: center;
        margin-bottom: 20px;
    }

    /* Calculator container */
    .calculator-container {
        max-width: 600px;
        background-color: #fff;
        margin: 40px auto;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Input fields */
    input[type="text"], input[type="number"], select {
        width: calc(100% - 20px);
        padding: 15px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 16px;
        color: #555;
        outline: none;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus, input[type="number"]:focus, select:focus {
        border-color: #4A90E2;
    }

    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #fff;
    }

    /* Submit button */
    .calculate {
        background-color: #4A90E2;
        color: white;
        padding: 15px 20px;
        font-size: 16px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        text-align: center;
        transition: background-color 0.3s ease;
        width: 100%;
    }

    .calculate:hover {
        background-color: #357ABD;
    }

    /* Result container */
    .result-container {
        text-align: center;
        margin-top: 20px;
    }

    .result {
        font-size: 28px;
        font-weight: bold;
        color: #4A90E2;
        margin-bottom: 10px;
    }

    .result-statement {
        font-size: 20px;
        color: #666;
    }

    /* Back button */
    .button-container {
        text-align: center;
        margin-top: 30px;
    }

    .back-button {
        padding: 12px 30px;
        background-color: #1e90ff;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        text-decoration: none;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .back-button:hover {
        background-color: #0d74d4;
    }

    /* Responsive styles */
    @media screen and (max-width: 768px) {
        .calculator-container {
            width: 90%;
            padding: 20px;
        }

        h1 {
            font-size: 28px;
        }

        .result {
            font-size: 24px;
        }

        .result-statement {
            font-size: 18px;
        }
    }
    </style>
    
</head>
<body>
    <?php include 'studenthome_sidebar.php'; ?>

    <div class="calculator-container">
        <h1>BMI CALCULATOR</h1>
        
        <!-- BMI Form -->
        <form method="POST" action="health.php">    
            <p>Name:</p>
            <input class="height-input-field" type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" required><br><br>
            
            <p>Height:</p>
            <input class="height-input-field" type="number" name="height" value="<?php echo isset($_POST['height']) ? $_POST['height'] : ''; ?>" required>
            <select id="height_unit" name="height_unit">
                <option value="cm" <?php echo isset($_POST['height_unit']) && $_POST['height_unit'] == 'cm' ? 'selected' : ''; ?>>Centimeters</option>
                <option value="m" <?php echo isset($_POST['height_unit']) && $_POST['height_unit'] == 'm' ? 'selected' : ''; ?>>Meters</option>
            </select>

            <p>Weight in kilograms:</p>
            <input class="weight-input-field" type="number" name="weight" value="<?php echo isset($_POST['weight']) ? $_POST['weight'] : ''; ?>" required><br>
            
            <button class="calculate" type="submit">Calculate</button>
        </form>

        <!-- BMI Results -->
        <?php if (!empty($bmi)): ?>
            <div class="result-container">
                <div class="result">Your BMI is: <?php echo $bmi; ?></div>
                <div class="result-statement">You are: <?php echo $bmi_category; ?></div>
            </div>
        <?php endif; ?>

        <div class="button-container">
            <a href="studenthome.php" class="back-button">Back to Student Dashboard</a>
        </div>
    </div>
</body>
</html>
