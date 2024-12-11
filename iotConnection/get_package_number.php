<?php
// Database connection credentials
$host = '18.139.255.32';
$dbname = 'parasafe_db';
$username = 'root';
$password = 'Pa$$word1';

// Create connection (pass the port parameter)
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the current server time in the Philippines timezone
date_default_timezone_set("Asia/Manila");
$time_ref = date("Y-m-d H:i:s");

// Query to fetch package_number, lock_state, and time_unlock for "ongoing" packages
$sql = "SELECT package_number, lock_state, time_unlock FROM forms WHERE status = 'ongoing' ORDER BY expected_delivery_date";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $packages = [];
    while ($row = $result->fetch_assoc()) {
        $packages[] = [
            "package_number" => $row["package_number"],
            "lock_state" => $row["lock_state"],
            "time_unlock" => $row["time_unlock"]
        ];
    }
    echo json_encode([
        "status" => "success",
        "time_ref" => $time_ref, // Add time_ref to the response
        "packages" => $packages
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "time_ref" => $time_ref, // Add time_ref even in the error response
        "message" => "No ongoing package numbers found"
    ]);
}

// Close connection
$conn->close();
?>
