<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Profile Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px;
        }
        h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        input, select, button {
            width: calc(100% - 20px);
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }
        button {
            background: #00f2fe;
            color: white;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            border: none;
            transition: background 0.3s;
        }
        button:hover {
            background: #00c3ff;
        }
    </style>
    <script>
        function validateForm() {
            var name = document.forms["school-form"]["name"].value;
            var contact = document.forms["school-form"]["contact"].value;
            var board = document.forms["school-form"]["board"].value;
            if (name == "" || contact == "" || board == "") {
                alert("Please fill out all required fields.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>School Profile Registration 🏫</h2>
        <form id="school-form" method="POST" action="" onsubmit="return validateForm()">
            <input type="text" name="name" placeholder="School Name" required>
            <input type="text" name="address" placeholder="Full Address" required>
            <input type="text" name="city" placeholder="City" required>
            <input type="text" name="state" placeholder="State" required>
            <input type="text" name="pincode" placeholder="Pincode" required>
            <input type="text" name="contact" placeholder="Contact Number" required>

            <!-- Dropdown for Digital Classrooms -->
            <select name="digital_classrooms" required>
                <option value="" disabled selected>Does the school have Digital Classrooms?</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>

            <!-- Dropdown for Name of the Board -->
            <select name="board" required>
                <option value="" disabled selected>Select Board</option>
                <option value="Maharashtra Board">Maharashtra Board</option>
                <option value="Tamil Nadu Board">Tamil Nadu Board</option>
                <option value="Rajasthan Board">Rajasthan Board</option>
            </select>

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
</body>
</html>
