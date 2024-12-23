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
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

// Set the timezone to Philippine Standard Time (PST)
date_default_timezone_set('Asia/Manila');

// Check if required POST fields are set
if (isset($_POST['package_number']) && isset($_POST['lock_state']) && isset($_POST['attempt'])) {
    $package_number = $_POST['package_number'];
    $lock_state = $_POST['lock_state'];  // "unlock" or "lock"
    $attempt = (int)$_POST['attempt'];  // Incremented attempt count

    // Prepare the time_unlock field
    $time_unlock = ($lock_state === 'unlock') ? date('Y-m-d H:i:s') : null;
    $status = ($lock_state === 'unlock') ? 'delivered' : 'ongoing'; // Set status to 'delivered' when unlocked, else 'ongoing'

    // SQL query to update lock_state, time_unlock, attempt, and status
    $sql = "UPDATE forms SET lock_state = ?, time_unlock = ?, attempt = ?, status = ? WHERE package_number = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param('ssiss', $lock_state, $time_unlock, $attempt, $status, $package_number);

        // Execute the query
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Package lock state, time_unlock, attempt, and status updated successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to update package status"]);
        }
        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to prepare statement"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Missing required fields"]);
}

// Close connection
$conn->close();
?>
