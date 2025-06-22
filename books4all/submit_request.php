<?php
include 'db_connect.php'; // Ensure you have a correct database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_name = mysqli_real_escape_string($conn, $_POST['bookName']);
    $author_name = mysqli_real_escape_string($conn, $_POST['author']);
    $grade = mysqli_real_escape_string($conn, $_POST['grade']);
    $publication = mysqli_real_escape_string($conn, $_POST['publication']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);

    // Insert data into the requested_books table
    $sql = "INSERT INTO requested_books (book_name, author, grade, publication, city) 
            VALUES ('$book_name', '$author_name', '$grade', '$publication', '$city')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Book request submitted successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }

    mysqli_close($conn);
}
?>
