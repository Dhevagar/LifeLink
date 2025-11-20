<?php
session_start();
include('connection.php');
?>

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
   $stmt = $conn->prepare("SELECT id, password FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
