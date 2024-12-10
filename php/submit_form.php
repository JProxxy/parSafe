<?php
include '../connection/connection.php';

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get form data
  $shopping_platform = $_POST['shopping_platform'];
  $other_platform = isset($_POST['otherPlatform']) ? $_POST['otherPlatform'] : null;
  $package_number = $_POST['package_number'];
  $delivery_man_name = $_POST['delivery_man_name'];
  $expected_delivery_date = $_POST['expected_delivery_date'];
  $courier_phone_number = $_POST['courier_phone_number'];
  $payment_method = $_POST['payment_method'];

  // Check if shopping platform is "Others" and use the other platform value
  if ($shopping_platform == "4") {
    $shopping_platform = $other_platform;
  }

  // Insert data into the database
  $query = "INSERT INTO forms (shopping_platform, package_number, delivery_man_name, expected_delivery_date, courier_phone_number, payment_method) 
              VALUES ('$shopping_platform', '$package_number', '$delivery_man_name', '$expected_delivery_date', '$courier_phone_number', '$payment_method')";

  if (mysqli_query($conn, $query)) {
    echo "Data inserted successfully!";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}

mysqli_close($conn); // Close the database connection
?>
