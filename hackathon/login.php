<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BooKs4All</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ff9966, #ff5e62);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background: #5b86e5;
            color: white;
            cursor: pointer;
            border: none;
        }
        button:hover {
            background: #36d1dc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login to BooKs4All 📚</h2>
        <form id="login-form" method="POST" action="">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="role" required>
                <option value="Donor">Donor</option>
                <option value="School">School</option>
                <option value="Volunteer">Volunteer</option>
            </select>
            <button type="submit" name="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
    
    <script>
        document.getElementById('login-form').addEventListener('submit', function(event) {
            let email = document.querySelector('input[name="email"]').value;
            let password = document.querySelector('input[name="password"]').value;
            let role = document.querySelector('select[name="role"]').value;
            
            if (!email || !password || !role) {
                alert('Please fill in all fields!');
                event.preventDefault();
            }
        });
    </script>

    <?php
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        
        $conn = new mysqli("localhost", "root", "", "books4all");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT * FROM users WHERE email='$email' AND role='$role'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                if ($role == "Donor") {
                    echo "<script>alert('Login successful!'); window.location='Donor.html';</script>";
                } elseif ($role == "School") {
                    echo "<script>alert('Login successful!'); window.location='school.html';</script>";
                } elseif ($role == "Volunteer") {
                    echo "<script>alert('Login successful!'); window.location='volunteer.html';</script>";
                }
            } else {
                echo "<script>alert('Invalid password!');</script>";
            }
        } else {
            echo "<script>alert('No user found with this email and role!');</script>";
        }
        
        $conn->close();
    }
    ?>
</body>
</html>