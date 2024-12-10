<?php
// Database connection credentials
$host = '18.139.255.32';
$dbname = 'parasafe_db';
$username = 'root';
$password = 'Pa$$word1';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get package_number and new status from POST data
$package_number = $_POST['package_number'];
$new_status = $_POST['status']; // 'completed', 'delivered', etc.

// Prepare the SQL query to update the status
$sql = "UPDATE forms SET status = ? WHERE package_number = ?";

// Prepare the statement
$stmt = $conn->prepare($sql);
if ($stmt) {
    // Bind parameters and execute the query
    $stmt->bind_param('ss', $new_status, $package_number);
    $result = $stmt->execute();

    if ($result) {
        echo json_encode(["status" => "success", "message" => "Package status updated successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to update package status"]);
    }

    // Close the statement
    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Failed to prepare the SQL statement"]);
}

// Close connection
$conn->close();
?>
