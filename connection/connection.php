<?php
// Define database credentials
$host = "localhost";  // Usually 'localhost' for local XAMPP setup
$username = "root";    // Default username for XAMPP
$password = "";        // Default password for XAMPP is empty
$dbname = "parasafe_db"; // Your database name
$port = 4306; // The custom port you're using
 
// Establish the connection
$conn = mysqli_connect($host, $username, $password, $dbname, $port);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
