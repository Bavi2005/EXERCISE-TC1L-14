<?php

session_start();

$host="localhost";
$user="root";
$password= "";
$db="schoolproject";

$data=mysqli_connect($host,$user,$password,$db);

if($data === false) {
    die("connection error");
}

if(isset($_POST['submit'])) {
    $data_name=$_POST['name'];
    $data_email=$_POST['email'];
    $data_phone=$_POST['phone'];
    $data_message=$_POST['message'];

    // Corrected SQL query with backticks for table name
    $sql="INSERT INTO `contact us`(name, email, phone, message) VALUES ('$data_name','$data_email','$data_phone','$data_message')";

    $result=mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['message']="your will be contacted soon";

        header("location:index.php");
    } else {
        echo "Apply Failed";
    }
}

?>
