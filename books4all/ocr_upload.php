<?php
if (isset($_FILES['book_image'])) {
    $file = $_FILES['book_image'];
    $upload_dir = "uploads/";

    // Get the original file extension
    $file_ext = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

    // Generate a new unique filename with the correct extension
    $new_filename = uniqid("ocr_", true) . '.' . $file_ext;
    $uploaded_path = $upload_dir . $new_filename;

    // Only allow image file types
    $allowed = ['jpg', 'jpeg', 'png', 'bmp', 'tif', 'tiff'];
    if (!in_array($file_ext, $allowed)) {
        echo "Invalid file type. Please upload an image file.";
        exit;
    }

    if (move_uploaded_file($file["tmp_name"], $uploaded_path)) {
        // Call Python script
        $command = escapeshellcmd("python ocr_processor.py " . escapeshellarg($uploaded_path));
        $output = shell_exec($command);
        $result = json_decode($output, true);

        if (isset($result['error'])) {
            echo "Error in OCR processing: " . htmlspecialchars($result['error']);
        } else {
            echo "<h3>Original Text:</h3><p>{$result['text']}</p>";
            echo "<h3>Detected Language:</h3><p>{$result['detected_language']}</p>";
            echo "<h3>Translated Text:</h3><p>{$result['translated_text']}</p>";
            echo "<h3>Region:</h3><p>{$result['region']}</p>";
        }
    } else {
        echo "File upload failed.";
    }
} else {
    echo "No file uploaded.";
}
?>
