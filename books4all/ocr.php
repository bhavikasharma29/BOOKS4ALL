<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["book_image"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["book_image"]["name"]);

    // Create uploads folder if not exists
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Save the uploaded file
    if (move_uploaded_file($_FILES["book_image"]["tmp_name"], $target_file)) {
        // Run Python script
        $command = escapeshellcmd("python3 ocr_processor.py " . escapeshellarg($target_file));
        $output = shell_exec($command);
        $result = json_decode($output, true);

        if (isset($result['error'])) {
            echo "<p>Error: " . htmlspecialchars($result['error']) . "</p>";
        } else {
            echo "<h2>OCR Result:</h2>";
            echo "<p><strong>Extracted Text:</strong> " . htmlspecialchars($result['text']) . "</p>";
            echo "<p><strong>Detected Language:</strong> " . htmlspecialchars($result['detected_language']) . "</p>";
            echo "<p><strong>Translated Text:</strong> " . htmlspecialchars($result['translated_text']) . "</p>";
            echo "<p><strong>Region:</strong> " . htmlspecialchars($result['region']) . "</p>";
        }
    } else {
        echo "<p>File upload failed.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OCR Processor</title>
</head>
<body>
    <h2>Upload an Image for OCR Processing</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="book_image" required>
        <button type="submit">Process Image</button>
    </form>
</body>
</html>
