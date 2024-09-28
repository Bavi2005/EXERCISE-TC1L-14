<?php

error_reporting(0);
session_start();


$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

// Connect to database
$data = mysqli_connect($host, $user, $password, $db);

// Check connection
if (!$data) {
    die("Connection error: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    // SQL query with prepared statement (its a bit differen from told, need to lear wat the fuck is this)
    $sql = "SELECT * FROM user WHERE username=? AND password=?";
    $stmt = mysqli_prepare($data, $sql);
    
    // Bind parameters (same here)
    mysqli_stmt_bind_param($stmt, "ss", $name, $pass);
    
    // Execute query (Ni jugak) n its only these 3 la different
    mysqli_stmt_execute($stmt);
    
    // Get result
    $result = mysqli_stmt_get_result($stmt);
    
    // Fetch row
    $row = mysqli_fetch_array($result);
    
    // Check user type and redirect
    if ($row && $row["usertype"] == "student") 
    {
        $_SESSION["username"] = $name;

        $_SESSION['usertype']="student";

        header("location: studenthome.php");
    } elseif ($row && $row["usertype"] == "admin")
    {
        $_SESSION["username"] = $name;

        $_SESSION['usertype']="admin";


        header("location: adminhome.php");
    } else {

        $message= "Username or password do not match";

        $_SESSION['loginMessage'] = $message;

        header("location:login.php");
    }
}

?>
