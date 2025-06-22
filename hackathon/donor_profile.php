<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Donor Registration - BooKs4All</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background: url('donor.jpg') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #d44c4c;
      height: 70px;
      padding: 0 30px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    .logo img {
      height: 85px; /* Increased logo size */
      width: auto;
    }

    nav ul {
      list-style: none;
      display: flex;
      margin-right: 30px;
    }

    nav ul li {
      margin: 0 12px;
    }

    nav ul li a {
      color: white;
      text-decoration: none;
      font-size: 15px;
      font-weight: bold;
      transition: color 0.3s;
    }

    nav ul li a:hover {
      color: #f0f0f0;
    }

    .main-content {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px 20px;
    }

    .container {
      background: rgba(255, 255, 255, 0.2); /* Transparent */
      backdrop-filter: blur(5px);
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      text-align: center;
      width: 520px;
    }

    h2 {
      font-size: 24px;
      margin-bottom: 20px;
      color: black;
    }

    input, select, textarea, button {
      width: calc(100% - 20px);
      padding: 12px;
      margin: 8px 0;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 16px;
      background-color: white;
    }

    textarea {
      resize: none;
      height: 70px;
    }

    button {
      background: #ff5e62;
      color: white;
      font-size: 18px;
      font-weight: bold;
      cursor: pointer;
      border: none;
      transition: background 0.3s;
      padding: 14px;
      border-radius: 8px;
    }

    button:hover {
      background: #ff3b41;
    }

    label {
      font-size: 16px;
      font-weight: bold;
      text-align: left;
      display: block;
      margin-top: 12px;
    }

    footer {
      background: rgba(212, 76, 76, 0.9);
      color: white;
      text-align: center;
      padding: 10px 0;
      font-size: 16px;
      height: 45px;
    }
  </style>
</head>
<body>

  <nav>
    <div class="logo">
      <img src="log.png" alt="BOOKS4ALL Logo">
    </div>
    <ul>
      <li><a href="landing.html">Home</a></li>
      <li><a href="Contact us.html">Contact Us</a></li>
      <li><a href="About us.html">About Us</a></li>
      <li><a href="signup.php">Sign up</a></li>
    </ul>
  </nav>

  <div class="main-content">
    <div class="container">
      <h2>Donor Registration 📚</h2>
      <form id="donor-form" method="POST" action="">
        <label>Full Name</label>
        <input type="text" name="name" placeholder="Enter your full name" required>
        
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter your email" required>
        
        <label>Phone Number</label>
        <input type="text" name="phone" placeholder="Enter your phone number" required>
        
        <label>Full Address</label>
        <textarea name="address" placeholder="Enter your full address" required></textarea>
        
        <label>City</label>
        <input type="text" name="city" placeholder="Enter your city" required>
        
        <label>State</label>
        <input type="text" name="state" placeholder="Enter your state" required>
        
        <label>Pincode</label>
        <input type="text" name="pincode" placeholder="Enter pincode" required>
        
        <button type="submit" name="register">Register</button>
      </form>
      <?php
        if (isset($_POST['register'])) {
            $conn = new mysqli("localhost", "root", "", "books4all");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $name = $conn->real_escape_string($_POST['name']);
            $email = $conn->real_escape_string($_POST['email']);
            $phone = $conn->real_escape_string($_POST['phone']);
            $address = $conn->real_escape_string($_POST['address']);
            $city = $conn->real_escape_string($_POST['city']);
            $state = $conn->real_escape_string($_POST['state']);
            $pincode = $conn->real_escape_string($_POST['pincode']);
            
            $sql = "INSERT INTO donors (name, email, phone, address, city, state, pincode) VALUES ('$name', '$email', '$phone', '$address', '$city', '$state', '$pincode')";
            
            if ($conn->query($sql) === TRUE) {
                echo "<p style='color: green;'>Registration successful!</p>";
            } else {
                echo "<p style='color: red;'>Error: " . $conn->error . "</p>";
            }
            
            $conn->close();
        }
        ?>
    </div>
  </div>

  <footer>
    &copy; 2025 BOOKS4ALL. All rights reserved.
  </footer>

</body>
</html>
