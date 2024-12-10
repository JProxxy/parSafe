<?php
$host = "localhost"; // Database host
$dbname = "parsafe_db"; // Database name
$username = "root"; // Database username
$password = ""; // Database password

// Create a PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
