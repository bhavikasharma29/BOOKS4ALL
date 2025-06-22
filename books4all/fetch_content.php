<?php
// Hardcoded values for now
$class = "8";
$subject = "Science";
$board = "Rajasthan Board"; // Change this to test different boards

echo "<h2>Available E-Books for Class $class - $subject ($board):</h2>";

$ebooks = [];

if ($board === "Maharashtra Board") {
    $ebooks = [
        [
            "title" => "General Science - Class 8",
            "description" => "Official textbook from Maharashtra State Board.",
            "link" => "https://ebalbharati.in"
        ]
    ];
} elseif ($board === "Tamil Nadu Board") {
    $ebooks = [
        [
            "title" => "Science - Class 8 (English Medium)",
            "description" => "TN SCERT textbook for Class 8 Science.",
            "link" => "https://textbookcorp.tn.gov.in"
        ],
        [
            "title" => "Science - Class 8 (Tamil Medium)",
            "description" => "தமிழ் வழி வகுப்பு அறிவியல் புத்தகம்.",
            "link" => "https://textbookcorp.tn.gov.in/Books?std=8&med=T"
        ]
    ];
} elseif ($board === "Rajasthan Board") {
    $ebooks = [
        [
            "title" => "Vigyan (Science) - Class 8",
            "description" => "Science textbook in Hindi from Rajasthan Board (RBSE).",
            "link" => "https://rajeduboard.rajasthan.gov.in"
        ]
    ];
} else {
    echo "<p>No content found for the selected board.</p>";
    exit();
}

echo "<ul>";
foreach ($ebooks as $book) {
    echo "<li>";
    echo "<h3>" . htmlspecialchars($book['title']) . "</h3>";
    echo "<p>" . htmlspecialchars($book['description']) . "</p>";
    echo "<a href='" . htmlspecialchars($book['link']) . "' target='_blank'>Read Now</a>";
    echo "</li>";
}
echo "</ul>";
?>
