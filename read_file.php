<?php
$filename = $_GET['filename'];

// Read the file contents
$fileContents = file_get_contents($filename);

// Output the file contents
echo $fileContents;
?>
