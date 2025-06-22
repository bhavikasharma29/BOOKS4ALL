<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Registration</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: url('volunteer.jpg') no-repeat center center cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            justify-content: center;
        }

        /* Navigation Bar */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #d44c4c;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 100;
            height: 55px; /* Fixed navbar height */
            padding: 0 40px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .logo img {
            height: 60px; /* Adjust size as needed */
            width: auto;
        }

        nav ul {
            list-style: none;
            display: flex;
            padding: 0;
            margin-right: 80px;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #f0f0f0;
        }

        /* Main Container */
        .container {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 500px;
            margin-top: 90px; /* Prevents overlap with navbar */
            margin-bottom: 90px;
            text-align: left;
            height: auto;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: black;
            text-align: center;
        }

        label {
            font-size: 15px;
            font-weight: bold;
            display: block;
            margin-top: 10px;
            color: black;
        }

        input, textarea, button {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
        }

        textarea {
            resize: none;
            height: 70px;
        }

        button {
            background: #d44c4c;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border: none;
            transition: background 0.3s;
            padding: 12px;
            border-radius: 8px;
            margin-top: 10px;
        }

        button:hover {
            background: #b13b3b;
        }

        /* Footer */
        footer {
            width: 100%;
            background: #d44c4c;
            color: white;
            text-align: center;
            padding: 10px 0;
            font-size: 16px;
            position: fixed;
            bottom: 0;
            box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 1100px) {
            nav ul {
                flex-wrap: wrap;
                justify-content: flex-end;
            }

            nav ul li {
                margin: 5px;
            }
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

    <div class="container">
        <h2>Register as a Volunteer</h2>
        <form id="volunteer-form" method="POST" action="">
            <input type="hidden" name="volunteer_id" value="<?php echo $_SESSION['volunteer_id']; ?>">
            
            <label>Full Name</label>
            <input type="text" name="name" placeholder="Enter your full name" required>
            
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
        session_start();
        if (isset($_POST['register'])) {
            $conn = new mysqli("localhost", "root", "", "books4all");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $volunteer_id = $_SESSION['volunteer_id'];
            $name = $conn->real_escape_string($_POST['name']);
            $phone = $conn->real_escape_string($_POST['phone']);
            $address = $conn->real_escape_string($_POST['address']);
            $city = $conn->real_escape_string($_POST['city']);
            $state = $conn->real_escape_string($_POST['state']);
            $pincode = $conn->real_escape_string($_POST['pincode']);
            
            $sql = "INSERT INTO volunteers (volunteer_id, name, phone, address, city, state, pincode) VALUES ('$volunteer_id', '$name', '$phone', '$address', '$city', '$state', '$pincode')";
            
            if ($conn->query($sql) === TRUE) {
                echo "<p style='color: green;'>Registration successful!</p>";
            } else {
                echo "<p style='color: red;'>Error: " . $conn->error . "</p>";
            }
            
            $conn->close();
        }
        ?>
    </div>

    <footer>&copy; 2025 BOOKS4ALL. All rights reserved.</footer>

</body>
</html>
