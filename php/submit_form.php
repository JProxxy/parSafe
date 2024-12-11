<?php
include '../connection/connection.php';

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get and sanitize form data
  $shopping_platform = mysqli_real_escape_string($conn, $_POST['shopping_platform']);
  $other_platform = isset($_POST['otherPlatform']) ? mysqli_real_escape_string($conn, $_POST['otherPlatform']) : null;
  $package_number = mysqli_real_escape_string($conn, $_POST['package_number']);
  $delivery_man_name = mysqli_real_escape_string($conn, $_POST['delivery_man_name']);
  $expected_delivery_date = mysqli_real_escape_string($conn, $_POST['expected_delivery_date']);
  $courier_phone_number = mysqli_real_escape_string($conn, $_POST['courier_phone_number']);
  $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);

  // Debugging package_number
  echo 'Package Number: ' . $package_number; // Check the value

  // Validate that package_number is numeric and within a valid range (for BIGINT)
  if (!is_numeric($package_number) || $package_number < 0 || $package_number > 9223372036854775807) {
      die("Invalid package number: it must be a positive number and within the allowed range for BIGINT.");
  }

  // Handle shopping platform "Others"
  if ($shopping_platform == "4") {
    $shopping_platform = $other_platform;
  }

  // Default values for missing columns
  $user_id = "NULL"; // If user_id is not provided, set it as NULL
  $status = 'ongoing'; // Default status
  $attempt = 0; // Default attempt
  $lock_state = 'locked'; // Default lock state
  $time_unlock = "NULL"; // Explicitly set to NULL

  // Explicitly insert values into the database
  $query = "INSERT INTO forms 
            (user_id, package_number, delivery_man_name, expected_delivery_date, courier_phone_number, 
            shopping_platform, payment_method, status, attempt, lock_state, time_unlock) 
            VALUES 
            ($user_id, '$package_number', '$delivery_man_name', '$expected_delivery_date', 
            '$courier_phone_number', '$shopping_platform', '$payment_method', '$status', 
            '$attempt', '$lock_state', $time_unlock)";

  if (mysqli_query($conn, $query)) {
    echo "Data inserted successfully!";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}

mysqli_close($conn); // Close the database connection
?>
