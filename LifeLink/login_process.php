<?php
session_start();
include('connection.php');
?>

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
