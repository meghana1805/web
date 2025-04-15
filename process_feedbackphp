<?php
include 'db.php';
session_start();

$user_id = $_SESSION['user_id'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$stmt = $conn->prepare("INSERT INTO feedback (user_id, subject, message) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $user_id, $subject, $message);
$stmt->execute();

header("Location: student_dashboard.php");
?>