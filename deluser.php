<?php

// Get the form data
if ($_SERVER["REQUEST_METHOD"] === "POST") {

$user = $_POST['username'];
$susername = escapeshellarg($user);


//$susername = 'myuser';



if (empty($user)) {
    $response = array("message" => "Please provide a username.");
} else {
    // Create the user using shell_exec or system function
    
    $output = shell_exec("sudo /bin/bash user_mgmt.sh check -u $susername");
   
    if (strpos($output, "user '$user' exists") !== false) {
        $result = shell_exec('sudo /bin/bash user_mgmt.sh delete -u ' . $susername . '');

        $response = array("message" => "user $user has been removed successfully");    
    } else {
     
            $response = array("message" => "user does not exist");
    }

 
}

    // Return the server resources data as JSON response

    header("Content-Type: application/json");
    echo json_encode($response);









// Store the user details in the MySQL database
include 'config/db.php';
$database = "adminboard";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selectQuery = "DELETE FROM systemusers WHERE username = '".$user."' ";
$result = $conn->query($selectQuery);

// Display user details in an HTML textarea
$conn->close();

}

?>

