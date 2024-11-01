<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileToUpload'])) {
    $targetDir = "uploads/";


    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $file = $_FILES['fileToUpload'];
    $fileName = basename($file['name']);
    $targetFile = $targetDir . $fileName;
    $fileSize = $file['size'];
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];


    if (!in_array($fileType, $allowedTypes)) {
        $message = "Error: Only JPG, PNG, and GIF files are allowed.";
    } elseif ($fileSize > 2 * 1024 * 1024) {
        $message = "Error: File size must not exceed 2MB.";
    } elseif (!getimagesize($file['tmp_name'])) {
        $message = "Error: Uploaded file is not a valid image.";
    } else {
   
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            $message = "File uploaded successfully: " . htmlspecialchars($fileName);
        } else {
            $message = "Error: There was an issue uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Image</title>
</head>
<body>
    <h1>Image Upload</h1>
    <?php

    if (isset($message)) {
        echo "<p>$message</p>";
    }
    ?>
    
    <form action="" method="post" enctype="multipart/form-data">
        <label for="fileToUpload">Select an image to upload:</label>
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>
