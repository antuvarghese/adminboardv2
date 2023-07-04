<?php
include 'config/db.php';
$database = "adminboard";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$susername = 'justin';
$spassword = 'VficcnajbejjUy';

$insertQuery = "INSERT INTO systemusers (username, password) VALUES ('$susername', '$spassword')";
$conn->query($insertQuery);


// Display user details in an HTML textarea
$conn->close();
?>