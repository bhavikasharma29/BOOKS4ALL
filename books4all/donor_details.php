<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Registration - BooKs4All</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ff9966, #ff5e62);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow-y: auto;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px;
            max-height: 90vh;
            overflow-y: auto;
        }
        h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        input, select, textarea, button {
            width: calc(100% - 20px);
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }
        textarea {
            resize: none;
            height: 80px;
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
    </style>
</head>
<body>
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
</body>
</html>
