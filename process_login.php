<?php
include 'db.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$result = $conn->query("SELECT * FROM users WHERE email = '$email'");
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['name'] = $user['name'];

    if ($user['role'] == 'admin') {
        header("Location: admin_dashboard.php");
    } else {
        header("Location: student_dashboard.php");
    }
} else {
    echo "Invalid credentials. <a href='login.html'>Try again</a>";
}
?>