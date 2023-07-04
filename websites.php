<?php 
      $currentPage = 'websites.php';
      include("header.php");

    ?> 



<h2 class="text-gray">Websites</h2>
      <hr>
      <div class="justify-content-right text-right mr-5 ml-20">
      <a href="create_websites.php">
      <button type="submit" class="btn btn-primary shadow-3"><i class="fa fa-plus"></i>&nbsp;Create Website</button>
</a>
    </div>
    <div class="row divider-m">


<?php
// Assuming you have a database connection established
include 'config/db.php';
$database = mysqli_select_db( $conn, 'adminboard' );


// Fetch data from MySQL
$sql = "SELECT * FROM websites";
$result = $conn->query($sql);

// Generate div blocks dynamically
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
       // $id = $row['id'];
       $domain = $row['domain'];

        $user = $row['username'];
        $php_version = $row['php_version'];
        $ssl_status = $row['ssl_status'];

      //  $description = $row['description'];

        // Generate the HTML div block
       /* echo '<div class="my-div">';
        echo "<h2>$name</h2>";
        echo "<p>test website</p>";
        echo '</div>'; */


      echo '<div class="col-sm-12 bg-mgray text-left divider-x shadow-3"> 
           <div class="ml-4"> 
           <p class="text-base text-gray">
             <span>'.$domain.'</span>
             <span class="icon float-right mr-5 mt-3"><i class="fa fa-server"></i></span>
           </p>
           <p class="text-sm text-gray">
           <span >user:'.$user.'</span>

             <span class="ml-4"><i class="fab fa-php"></i>&nbsp;'.$php_version.'</span>'; 

            if ($ssl_status === 'yes') { 
              echo '<span class="ml-4"><i class="fa fa-lock shadow-3" style="color:green;"></i>&nbsp;</span>'; 

            }
            else{

            echo '<span class="ml-4"><i class="fa fa-unlock shadow-3" style="color:orange;"></i>&nbsp;</span>'; 

            }

          echo '
          </p>
            </div>
          </div> ';

 
              }
          } else {
              echo "No data found.";
          }

          // Close the database connection
          $conn->close();
?>

</div>
</body>
</html>


