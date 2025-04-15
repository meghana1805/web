<?php
include 'db.php';
session_start();

if ($_SESSION['role'] != 'admin') {
    header("Location: login.html");
    exit();
}

$result = $conn->query("SELECT f.subject, f.message, u.name FROM feedback f JOIN users u ON f.user_id = u.id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Welcome, Admin <?= $_SESSION['name'] ?>!</h2>
    <a href="logout.php" class="btn btn-danger mb-3">Logout</a>

    <h4 class="mb-3">All Feedbacks</h4>

    <!-- Table format -->
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Subject</th>
                <th>Feedback</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['subject']) ?></td>
                <td><?= htmlspecialchars($row['message']) ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>