<?php

// Get the form data
if ($_SERVER["REQUEST_METHOD"] === "POST") {


$user = $_POST["username"];
$path = $_POST["path"];
$pass = $_POST["password"];
$susername = escapeshellarg($user);
$spath = escapeshellarg($path);
$spassword = escapeshellarg($pass); 


//$user = "";
/*$pass = 'niufehn3ce';
$susername = escapeshellarg($user);
$spassword = escapeshellarg($pass); */

// Create the Linux user


if (empty($user)) {
    $response = array("message" => "Please provide a username.");
} else {
    // Create the user using shell_exec or system function
    $output = shell_exec("sudo /bin/bash user_mgmt.sh check -u $user");
    //$output = shell_exec("sudo /bin/bash check_user.sh $username");
    //$output = 'user rambo exists';
    //echo $output;
    //$response = array("message" => "User created successfully.");
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

//$insertQuery = "INSERT INTO systemusers (username, password) VALUES ('".$user."', '".$pass."')";
$insertuserQuery = "INSERT INTO systemusers (username, path, password) VALUES ('".$user."', '".$path."', '".$pass."')";

$conn->query($insertuserQuery);
//echo $insertQuery;


// Display user details in an HTML textarea
$conn->close();

}
?>

