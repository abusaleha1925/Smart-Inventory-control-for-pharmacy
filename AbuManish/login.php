<?php
// Database connection
$conn = new mysqli('localhost', 'system', '', 'medical');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get username and password from form submission
$username = $_POST['username'];
$password = $_POST['password'];

// Query to check if username and password match in the database
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

// Check if any row is returned
if ($result->num_rows > 0) {
    // Authentication successful, redirect to dashboard
    header('Location: dashboard.php');
    exit();
} else {
    // Authentication failed, redirect back to login page with error message
    header('Location: index.php?error=1');
    exit();
}

// Close database connection

