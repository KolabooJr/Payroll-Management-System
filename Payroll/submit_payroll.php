<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payroll";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data from form submission
$employeeName = $_POST['employeeName'];
$employeeID = $_POST['employeeID'];
$salary = $_POST['salary'];
$department = $_POST['department'];
$payDate = $_POST['payDate'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO payroll (employee_name, employee_id, salary, department, pay_date) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $employeeName, $employeeID, $salary, $department, $payDate);

// Execute the query
if ($stmt->execute()) {
    echo "New payroll record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

// Redirect back to the payroll page
header("Location: payroll.html");
exit();
?>
