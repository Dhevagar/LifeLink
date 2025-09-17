<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "lifelink";  // change to your actual database name

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
