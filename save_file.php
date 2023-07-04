<?php
/*

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $file = $_FILES["file"]["name"];
  $content = $_POST["content"];
  //file_put_contents("test.txt","Hello World. Testing!");
  echo $file;


  if (!empty($file) && !empty($content)) {

      // Save the modified content to the file
       file_put_contents($file, $content);
  }
   

  // Redirect back to the editor page
 //header("Location: test-editor.html");
 // exit();
}
*/

if ($_SERVER["REQUEST_METHOD"] === "GET") {

$readfilename = $_GET['filename'];

// Read the file contents
$readfileContents = file_get_contents($readfilename);

// Output the file contents
echo $readfileContents;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

$filename = $_POST['filename'];
$content = $_POST['content'];

// Save the content to the file
file_put_contents($filename, $content);

echo "File saved successfully!";


}


?>



