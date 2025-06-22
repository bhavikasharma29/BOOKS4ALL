<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Profile Registration</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: url('bg.jpg') no-repeat center center fixed;
            background-size: cover;
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
            height: 55px; /* Reduced height */
            padding: 0 30px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .logo img {
            height: 45px;
            width: auto;
        }

        nav ul {
            list-style: none;
            display: flex;
            padding: 0;
            margin-right: 50px;
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

        /* Main Container */
        .container {
            background: rgba(255, 255, 255, 0.2); /* Transparent White */
            backdrop-filter: blur(10px); /* Blur effect */
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 500px; /* Increased width */
            margin-top: 80px; /* Prevents overlap with header */
            margin-bottom: 80px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: black;
        }

        input, button {
            width: calc(100% - 20px);
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }

        button {
            background:#d44c4c;
            color: white;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            border: none;
            transition: background 0.3s;
        }

        button:hover {
            background:#e77171;
        }

        /* Footer */
        footer {
            width: 100%;
            background: rgba(212, 76, 76, 0.9);
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
    <script>
        function validateForm() {
            var name = document.forms["school-form"]["name"].value;
            var contact = document.forms["school-form"]["contact"].value;
            if (name == "" || contact == "") {
                alert("Please fill out all required fields.");
                return false;
            }
            return true;
        }
    </script>
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
        <h2>School Profile Registration 🏫</h2>
        <form id="school-form" method="POST" action="" onsubmit="return validateForm()">
            <input type="text" name="name" placeholder="School Name" required>
            <input type="text" name="address" placeholder="Full Address" required>
            <input type="text" name="city" placeholder="City" required>
            <input type="text" name="state" placeholder="State" required>
            <input type="text" name="pincode" placeholder="Pincode" required>
            <input type="text" name="contact" placeholder="Contact Number" required>
            <button type="submit" name="register">Register</button>
        </form>
        <?php
        if (isset($_POST['register'])) {
            $conn = new mysqli("localhost", "root", "", "books4all");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $name = $conn->real_escape_string($_POST['name']);
            $address = $conn->real_escape_string($_POST['address']);
            $city = $conn->real_escape_string($_POST['city']);
            $state = $conn->real_escape_string($_POST['state']);
            $pincode = $conn->real_escape_string($_POST['pincode']);
            $contact = $conn->real_escape_string($_POST['contact']);
            $digital_classrooms = $conn->real_escape_string($_POST['digital_classrooms']);
            $board = $conn->real_escape_string($_POST['board']);
            
            $sql = "INSERT INTO school (name, address, city, state, pincode, contact, digital_classrooms, board) 
                    VALUES ('$name', '$address', '$city', '$state', '$pincode', '$contact', '$digital_classrooms', '$board')";
            
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
