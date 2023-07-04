<?php
//cors policy
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  //  $username = $_POST["username"];
    $location = $_POST["location"];
    $password = $_POST["password"];

    $username = "";
 //   $location = '/home/sam10';
 //   $password = 'ceuhiecev$13';


    if (empty($username)) {
        $response = array("message" => "Please provide a username.");
    } else {
        // Create the user using shell_exec or system function
        $output = shell_exec("sudo /bin/bash user_mgmt.sh check -u $username");
        //$output = shell_exec("sudo /bin/bash check_user.sh $username");
        //$output = 'user rambo exists';
        //echo $output;
        //$response = array("message" => "User created successfully.");
        if (strpos($output, "user '$username' exists") !== false) {
            $response = array("message" => "Failed to create. user $username already exists");    
        } else {
            $result = shell_exec("sudo /bin/bash user_mgmt.sh add -u $username -p $password -l $location ");
            if (strpos($result, "user '$username' created") !== false) {
                $response = array("message" => "User created successfully.");    
            } else {
                $response = array("message" => "something went wrong!");
            }
        }

     
    }
    // Return the server resources data as JSON response

    header("Content-Type: application/json");
    echo json_encode($response);

}

?>