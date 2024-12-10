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

// Query to fetch all package_number with status "ongoing" ordered by expected_delivery_date
$sql = "SELECT package_number FROM forms WHERE status = 'ongoing' ORDER BY expected_delivery_date";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $packageNumbers = [];
    while ($row = $result->fetch_assoc()) {
        $packageNumbers[] = $row["package_number"];
    }
    echo json_encode(["status" => "success", "package_numbers" => $packageNumbers]);
} else {
    echo json_encode(["status" => "error", "message" => "No ongoing package numbers found"]);
}

// Close connection
$conn->close();
?>
