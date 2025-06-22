<?php
$servername = "localhost";  // Change this if your database is hosted elsewhere
$username = "root";         // Change this to your database username
$password = "";             // Change this to your database password
$database = "books4all";     // Change this to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
