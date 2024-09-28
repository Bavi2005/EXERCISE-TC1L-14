<?php

session_start();
session_destroy();

// Correct the location header
header("Location: login.php");
exit;

?>
