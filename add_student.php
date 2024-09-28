<?php
session_start();

// Check if the user is logged in and their user type is 'admin'
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit;
} elseif ($_SESSION['usertype'] != 'admin') {
    header("location:login.php");
    exit;
}

$host="localhost";
$user="root";
$password="";
$db="schoolproject";

$data=mysqli_connect($host,$user,$password,$db);
if(isset($_POST['add_student']))
{
    $username=$_POST['name'];
    $user_email=$_POST['email'];
    $user_phone=$_POST['phone'];
    $user_password=$_POST['password'];
    $usertype="student";

    $sql="INSERT INTO user(username,email,phone,usertype,password) VALUES ('$username','$user_email','$user_phone','$usertype','$user_password')";

    $result=mysqli_query($data,$sql);

    if($result)
    {
        echo " <script type='text/javascript'>

        alert('Data Upload Success');
        
        </script>";
    }

    else
    {
        echo "Upload Failed";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    

    <style>
        label
        {
            display: inline-block;
            text-decoration: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg
        {
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
        .button-container {
        text-align: center;
        margin-top: 20px;
        margin-left: 300px;
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
        
        /* Add background image */
        .content {
        background-image: url('student.jpg');
        background-size: cover;
        background-position: -50px -50px; /* adjust the position to -50px from the left and -50px from the top */
        background-attachment: fixed;
        height: 80vh;
        width: 80%;
        display: flex;
        justify-content: center;
        align-items: center;
        }
    </style>


    <?php include 'admin_css.php'; ?>


</head>
<body>

    <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        <center>
        <h1>Add Student</h1>

        <div class="div_deg">

            <form action="#" method="POST">

                <div>
                    <label>Username</label>
                    <input type="text" name="name">
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" name="email">
                </div>
                
                <div>
                    <label>phone</label>
                    <input type="number" name="phone">
                </div>

                <div>
                    <label>Password</label>
                    <input type="text" name="password">
                </div>

                <div>
                    <input type="submit" class="btn btn-primary" name="add_student" value="Add Student">
                </div>
            
            </form>
            
        </div>

        </center>
    
    </div>
       
    <div class="button-container">
        <a href="adminhome.php" class="back-button">Back to Admin Dashboard</a>
    </div>

</body>
</html>
