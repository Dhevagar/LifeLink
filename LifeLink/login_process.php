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
  if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $admin['password'])) {
            // Password correct, set session and redirect
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id'] = $admin['id'];
            header("Location: admin.php");
            exit();
        } else {
            // Incorrect password
            $_SESSION['login_error'] = "Incorrect password.";
            header("Location: login.php");
            exit();
        }
    } else {
        // Username not found
        $_SESSION['login_error'] = "Username not found.";
        header("Location: login.php");
        exit();
    }
}
?>
