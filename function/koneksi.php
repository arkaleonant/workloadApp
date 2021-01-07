<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "magang_pal"; 

$conn=mysqli_connect($server,$username,$password);
mysqli_select_db($conn,$database);

error_reporting(0);
?>
