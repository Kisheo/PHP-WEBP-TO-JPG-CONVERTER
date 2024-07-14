<?php
// Function to convert a single WebP image to JPG
function convertWebPToJPG($source, $destination) {
    // Load the WebP image
    $webpImage = imagecreatefromwebp($source);
    if (!$webpImage) {
        echo "Failed to load WebP image: $source\n";
        return false;
    }

    // Save the image as JPG
    if (!imagejpeg($webpImage, $destination, 100)) {
        echo "Failed to save JPG image: $destination\n";
        return false;
    }

    // Free up memory
    imagedestroy($webpImage);

    echo "Successfully converted $source to $destination\n";
    return true;
}

// Directory containing WebP images
$webpDirectory = 'path/to/webp/images';
$jpgDirectory = 'path/to/jpg/images';

// Ensure the JPG directory exists
if (!is_dir($jpgDirectory)) {
    mkdir($jpgDirectory, 0777, true);
}

// Iterate over all WebP files in the directory
$webpFiles = glob($webpDirectory . '/*.webp');
foreach ($webpFiles as $webpFile) {
    $fileName = pathinfo($webpFile, PATHINFO_FILENAME);
    $jpgFile = $jpgDirectory . '/' . $fileName . '.jpg';

    // Convert the WebP file to JPG
    convertWebPToJPG($webpFile, $jpgFile);
}
?>
