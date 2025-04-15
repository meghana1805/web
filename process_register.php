<?php
include 'db.php';

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$role = $_POST['role'];

// Check if email already exists
$check = $conn->prepare("SELECT id FROM users WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo "Email already exists. <a href='register.html'>Try again</a>";
} else {
    // Email doesn't exist, insert the user
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $password, $role);

    if ($stmt->execute()) {
        echo "Registration successful. <a href='login.html'>Login here</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>