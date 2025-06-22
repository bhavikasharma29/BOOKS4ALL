<?php
include 'db_connect.php'; // Ensure this file contains your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $city = $_POST['city'];
    $book_name = $_POST['book_name'];
    $author = $_POST['author'];
    $publication = $_POST['publication'];
    $grade = $_POST['grade'];
    $book_condition = $_POST['book_condition'];
    // $status = $_POST['status'];
    $status = "available"; // Default status

    $pickup_address = $_POST['pickup_address'];
    $date = $_POST['date'];
    $quantity = $_POST['quantity'];
   
    // Prepare SQL query
    $sql = "INSERT INTO available_books (city, book_name, author, publication, grade, book_condition, status, pickup_address, date, quantity) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssi", $city, $book_name, $author, $publication, $grade, $book_condition, $status, $pickup_address, $date, $quantity);

    if ($stmt->execute()) {
        echo "<script>alert('Book added successfully!'); window.location.href='donor_dashboard.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request!'); window.history.back();</script>";
}
?>
