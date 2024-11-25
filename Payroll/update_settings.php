<?php
// Connection variables
$servername = "localhost";
$username = "root";  // Your MySQL username
$password = "";      // Your MySQL password
$dbname = "payroll_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data from form
$adminUsername = $_POST['adminUsername'];
$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];

// Basic password confirmation check
if ($newPassword !== $confirmPassword) {
    die("Passwords do not match. Please try again.");
}

// Encrypt the password (you should be using more secure methods in production)
$hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

// Update query (this assumes an 'admins' table with a 'username' field)
$sql = "UPDATE admins SET password='$hashedPassword' WHERE username='$adminUsername'";

if ($conn->query($sql) === TRUE) {
    echo "Settings updated successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
