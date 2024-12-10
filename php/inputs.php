<?php
include '../connection/connection.php';

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

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Responsive Registration Form | CodingLab </title>
  <link rel="stylesheet" href="../css/styletest.css">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <header class="header container">

    <div class="logo"><a href="../php/index.php">
        <h2 class="header__title">Parsafe</h2>
      </a>
      <img class="logo-img" src="../src/logo.png" alt="" style=" filter: invert(100%) brightness(200%);">
    </div>



    <nav class="header__menu">
      <a class="header__links" href="#pricing">Pricing</a>
      <a class="header__links" href="inputs.php">Features</a>
      <a class="header__links" href="#contact">Contact</a>

    </nav>
    <div class="header__btn-container">
      <button class="btn">Login</button>
      <button class="btn">Download App</button>
    </div>
    <div class="gear"><i class="fa fa-gear" style="color: white;font-size:24px;"></i></div>
  </header>


  <div class="spacer"></div>
  <div class="form-container">
    <img class="logo-img" src="logo.png" alt="" style="position: absolute; top: 10px;right: 10px;">
    <!-- Title section -->
    <div class="title">Delivery Details</div>
    <div class="content">
      <form action="../php/submit_form.php" method="POST">
        <div class="container-drop">
          <!-- Shopping Platform -->
          <div class="select">
            <select id="shoppingPlatform" name="shopping_platform" onchange="handleSelectChange()" required>
              <option value="" disabled selected hidden>Choose a Shopping Platform</option>
              <option value="1">Shopee</option>
              <option value="2">Lazada</option>
              <option value="3">Shein</option>
              <option value="4">Others</option>
            </select>
          </div>

          <!-- Other Platform Input -->
          <div class="text-input" style="display:none;">
            <input type="text" id="otherInput" name="otherPlatform" placeholder="Please specify">
          </div>

          <div class="user-details">
            <!-- Package Number -->
            <div class="input-box">
              <span class="details">Package Number</span>
              <input type="number" name="package_number" placeholder="Enter your Package Number" required>
            </div>

            <!-- Delivery Man Name -->
            <div class="input-box">
              <span class="details">Delivery Man Name</span>
              <input type="text" name="delivery_man_name" placeholder="Enter Delivery Man Name" required>
            </div>

            <!-- Expected Date of Delivery -->
            <div class="calendar-container">
              <label for="datePicker" class="calendar-label">Expected Date of Delivery</label>
              <input type="date" id="datePicker" name="expected_delivery_date" class="calendar-input" required>
            </div>

            <!-- Courier Phone Number -->
            <div class="input-box">
              <span class="details">Courier Phone Number</span>
              <input type="number" name="courier_phone_number" placeholder="Enter Courier Number" required>
            </div>
          </div>
          <!-- Payment Method -->
          <div class="radio-details">
            <span class="radio-title">Payment Methods</span>

            <div class="category">
              <!-- COD Option -->
              <input type="radio" name="payment_method" id="dot-1" value="COD" required>
              <label for="dot-1">
                <span class="dot one"></span>
                <span class="choices">COD</span>
              </label>

              <!-- Cash Option -->
              <input type="radio" name="payment_method" id="dot-2" value="Cash">
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="choices">Cash</span>
              </label>

              <!-- Card Option -->
              <input type="radio" name="payment_method" id="dot-3" value="Card">
              <label for="dot-3">
                <span class="dot three"></span>
                <span class="choices">Card</span>
              </label>
            </div>




            <!-- Submit Button -->
            <div class="button">
              <input type="submit" value="Submit">
            </div>
          </div>
      </form>

      <script>
        function handleSelectChange() {
          const select = document.getElementById("shoppingPlatform");
          const textInput = document.querySelector(".text-input");

          // Show or hide the textbox based on the selected value
          if (select.value === "4") {
            textInput.style.display = "block";
          } else {
            textInput.style.display = "none";
          }
        }
      </script>

    </div>
  </div>
  </div>

  <div class="spacer"></div>


  <footer class="footer">
    <div class="footer-container">
      <div class="footer-about">
        <h3>ParSec</h3>
        <p>Smart Delivery Mailbox with Secure Package and Payment Management</p>
      </div>

      <div class="footer-links">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>

      <div class="footer-social">
        <h4>Follow Us</h4>
        <a href="#" class="social-icon">Facebook</a>
        <a href="#" class="social-icon">Twitter</a>
        <a href="#" class="social-icon">LinkedIn</a>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2024 ParSec. All rights reserved.</p>
    </div>
  </footer>
</body>
<script>
  window.onload = function () {
    "use strict";
  };

  function handleSelectChange() {
    const select = document.getElementById("shoppingPlatform");
    const textInput = document.querySelector(".text-input");

    // Show or hide the textbox based on the selected value
    if (select.value === "4") {
      textInput.style.display = "block";
    } else {
      textInput.style.display = "none";
    }
  }

</script>



</html>