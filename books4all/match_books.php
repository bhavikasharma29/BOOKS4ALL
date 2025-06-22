<?php
include 'function.php';

// Fetch data from the database
$availableBooks = fetchAvailableBooks($conn);
$requestedBooks = fetchRequestedBooks($conn);

// Perform matching
$matches = matchBooks($availableBooks, $requestedBooks);

// Output matches
foreach ($matches as $match) {
    echo "Request ID: " . $match['request_id'] . " matched with Book ID: " . $match['book_id'] .
         " (Score: " . $match['score'] . ")\n";
    echo "Book Name: " . $match['book_name'] . "\n";
    echo "Author: " . $match['author'] . "\n";
    echo "Grade: " . $match['grade'] . "\n";
    echo "City: " . $match['city'] . "\n";
    echo "------------------------\n";
}

$conn->close();
?>