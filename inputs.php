<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Responsive Registration Form | CodingLab </title>
  <link rel="stylesheet" href="styletest.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="header container">

    <div class="logo"><a href="index.php"><h2 class="header__title">Parsafe</h2></a>
      <img class="logo-img" src="logo.png" alt="" style=" filter: invert(100%) brightness(200%);"></div>

    
      
     <nav class="header__menu">
       <a class="header__links" href="#pricing">Pricing</a>
       <a class="header__links" href="inputs.php">Featuressss</a>
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
      
        <div class="container-drop">
            <div class="select">
              <select id="shoppingPlatform" onchange="handleSelectChange()">
                <option value="" disabled selected hidden>Choose a Shopping Platform</option>
                <option value="1">Shopee</option>
                <option value="2">Lazada</option>
                <option value="3">Shein</option>
                <option value="4">Others</option>
              </select>
            </div>
            <div class="text-input">
                <input type="text" id="otherInput" placeholder="Please specify">
              </div>
      <!-- Registration form -->
      <form action="#">
        <div class="user-details">
          <!-- Input for Full Name -->
          <div class="input-box">
            <span class="details">Package Number</span>
            <input type="number" placeholder="Enter your Package Number" required>
          </div>
          <!-- Delivry man name -->
          <div class="input-box">
            <span class="details">Delivery Man Name</span>
            <input type="text" placeholder="Enter Delivery Man Name" required>
          </div>
          <!-- Calendar Date -->
          <div class="calendar-container">
            <label for="datePicker" class="calendar-label">Expected Date of Delivery</label>
             <input 
               type="date" 
               id="datePicker" 
               class="calendar-input" 
               placeholder="Select a date">
           </div>
          <!-- Input for Phone Number -->
          <div class="input-box">
            <span class="details">Courier Phone Number</span>
            <input type="number" placeholder="Enter Courier number" required>
          </div>
      
        </div>
        <div class="radio-details">
            <!-- payment -->
            <input type="radio" name="payment" id="dot-1">
            <input type="radio" name="payment" id="dot-2">
            <input type="radio" name="payment" id="dot-3">
            <span class="radio-title">Payment Methods</span>
            <div class="category">
             
              <label for="dot-1">
                <span class="dot one"></span>
                <span class="choices">COD</span>
              </label>
             
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="choices">Cash</span>
              </label>
             
              <label for="dot-3">
                <span class="dot three"></span>
                <span class="choices">Card</span>
              </label>
            </div>
          </div>
    
       
        <!-- Submit button -->
        <div class="button">
          <input type="submit" value="Submit">
        </div>
      </form>
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