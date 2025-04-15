<?php
include 'db.php';
session_start();

if ($_SESSION['role'] != 'student') {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM feedback WHERE user_id = $user_id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Welcome, <?= $_SESSION['name'] ?>!</h2>
    <a href="feedback.php" class="btn btn-primary mb-3">Submit New Feedback</a>
    <a href="logout.php" class="btn btn-danger mb-3">Logout</a>
    <h4>Your Feedbacks</h4>
    <ul class="list-group">
        <?php while ($row = $result->fetch_assoc()): ?>
        <li class="list-group-item">
            <strong><?= $row['subject'] ?>:</strong> <?= $row['message'] ?>
        </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>