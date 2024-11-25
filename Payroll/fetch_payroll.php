<?php
$conn = new mysqli("localhost", "root", "", "payroll");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT employee_name, employee_id, department, salary, pay_date FROM payroll";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['employee_name']) . "</td>
                <td>" . htmlspecialchars($row['employee_id']) . "</td>
                <td>" . htmlspecialchars($row['department']) . "</td>
                <td>" . htmlspecialchars($row['salary']) . "</td>
                <td>" . htmlspecialchars($row['pay_date']) . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No records found</td></tr>";
}

$conn->close();
?>

