<?php
include 'db_connect.php';

// Function to fetch available books
function fetchAvailableBooks($conn) {
    $sql = "SELECT * FROM available_books WHERE status = 'available'";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Function to fetch requested books
function fetchRequestedBooks($conn) {
    $sql = "SELECT * FROM requested_books";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Function to match books
function matchBooks($availableBooks, $requestedBooks) {
    $matches = [];

    foreach ($requestedBooks as $request) {
        $bestMatch = null;
        $bestScore = 0;

        foreach ($availableBooks as $book) {
            $score = 0;

            // Match by book name
            if (stripos($book['book_name'], $request['book_name']) !== false) {
                $score += 3;
            }

            // Match by author
            if ($request['author'] && stripos($book['author'], $request['author']) !== false) {
                $score += 2;
            }

            // Match by grade
            if ($request['grade'] && stripos($book['grade'], $request['grade']) !== false) {
                $score += 2;
            }

            // Match by city
            if (stripos($book['city'], $request['city']) !== false) {
                $score += 1;
            }

            // Check if this is the best match so far
            if ($score > $bestScore) {
                $bestScore = $score;
                $bestMatch = $book;
            }
        }

        if ($bestMatch) {
            $matches[] = [
                'request_id' => $request['request_id'],
                'book_id' => $bestMatch['book_id'],
                'score' => $bestScore,
                'book_name' => $bestMatch['book_name'],
                'author' => $bestMatch['author'],
                'grade' => $bestMatch['grade'],
                'city' => $bestMatch['city']
            ];
        }
    }

    return $matches;
}
?>