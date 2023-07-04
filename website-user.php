<?php

// Get the form data
if ($_SERVER["REQUEST_METHOD"] === "POST") {

$domain = $_POST["domain"];
$user = $_POST["username"];
$php_version = $_POST["phpversion"];
$susername = escapeshellarg($user);
$spath = escapeshellarg($path);
$spassword = escapeshellarg($pass); 

/*


if (empty($user)) {
    $response = array("message" => "Please provide a username.");
} else {
    // Create the user using shell_exec or system function
    $output = shell_exec("sudo /bin/bash user_mgmt.sh check -u $user");
 
    if (strpos($output, "user '$user' exists") !== false) {
        $response = array("message" => "Failed to create. user $user already exists");    
    } else {
        $result = shell_exec("sudo /bin/bash user_mgmt.sh add -u $user -p $pass -l $path ");
        if (strpos($result, "user '$user' created") !== false) {
            $response = array("message" => "User created successfully.");    
        } else {
            $response = array("message" => "something went wrong!");
        }
    }

 
}
*/
$response = "domain created successfully";
    // Return the server resources data as JSON response

    header("Content-Type: application/json");
    echo json_encode($response);

//$result = shell_exec('sudo /bin/bash user_mgmt.sh add -u ' . $susername . ' -p ' . $spassword . ' -l ' . $spath . '');

//echo $result;


// Store the user details in the MySQL database
include 'config/db.php';
$database = "adminboard";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$insertwebQuery = "INSERT INTO `websites` (`username`, `domain`, `php_version`, `wp_status`) VALUES ('".$user."', '".$domain."', '".$php_version."', 'yes')";
//$insertQuery = "INSERT INTO `websites` (`id`, `username`, `domain`, `php_version`) VALUES (NULL, '".$user."', '".$domain."', '7.4')";

$conn->query($insertwebQuery);
//echo $insertQuery;


// Display user details in an HTML textarea
$conn->close();

}
?>

