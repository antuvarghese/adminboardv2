<?php
$username = $_POST['username'];

// Escape the username to prevent command injection
$escapedUsername = escapeshellarg($username);

// Create the command to write the username to a text file
$command = 'echo ' . $escapedUsername . ' > cred.txt';

// Execute the command using shell_exec
$output = shell_exec($command);

if ($output === null) {
    echo 'Username written to file successfully.';
} else {
    echo 'An error occurred while writing the username to file.';
}
?>
