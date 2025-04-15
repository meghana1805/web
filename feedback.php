<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Submit Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="mb-4">Submit Feedback</h2>
    <form action="process_feedback.php" method="POST">
        <input type="text" name="subject" class="form-control mb-3" placeholder="Subject" required>
        <textarea name="message" class="form-control mb-3" placeholder="Your feedback..." required></textarea>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>