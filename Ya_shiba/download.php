<!-- Programmer Name: Tay Hui Yee-->
<!-- Program Name : Download file -->
<!-- Description:download the teacher file  -->
<!-- First Written: 22/6/2023 -->
<!-- Eddited on: 7/7/2023-->



<?php
if (isset($_GET['file'])) {
    // Retrieve the file name from the query parameter
    $fileName = $_GET['file'];

    // Construct the file path
    $filePath = "lect_task/" . $fileName;

    // Check if the file exists before sending it for download
    if (file_exists($filePath)) {
        // Set the appropriate headers for file download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Content-Length: ' . filesize($filePath));

        // Send the file for download
        readfile($filePath);

        // Exit the script to prevent further output
        exit();
    } else {
        echo "File not found: " . $fileName . "<br>";
    }
}
?>
