<?php 
      $currentPage = 'databases.php';
      include("header.php");

    ?> 




      <!-- content goes here -->

      <div class="container-fluid fill-100">
    
        <h2 id="myD">DATABASES</h2>
        
        
        <hr>
    
        <div class="row divider-m justify-content-center">

        <div class="col-sm-10 bg-mgray text-left divider-x shadow-5"> 
        <form>
          <div class="form-group form-inline ml-4">
            <label for="exampleInputEmail1">Create a new database</label>
           </div>
           <div class="container">
            <div class="row ">
              <div class="col-sm-4 ml-2 text-gray">
                You can create a new database here<span class="icon ml-2"> <i class="fas fa-database "></i></span>
              </div>
              <div class="col-sm">
                <div class="form-group col-sm-10">
                    <label for="dbname">Database</label>
                    <input type="text" class="form-control text-light" id="dbname" placeholder="Enter database name">
                </div>

                <div class="form-group col-sm-10">
                    <label for="dbuser">User</label>
                    <input type="text" class="form-control text-light" id="dbuser" placeholder="Enter database username">
                </div>
                <div class="form-group col-sm-10">
                    <label for="dbpassword">Password</label>
                    <input type="text" class="form-control text-light" id="dbpassword" placeholder="Enter password">
                </div>
              </div>
            </div>
           </div>
            <div class="justify-content-right text-right mr-5 ml-20">
                <button type="submit" class="btn btn-primary shadow-3">Create</button>
            </div>
        </form>
        </div>
        </div>


        <hr>

        <div class="row divider-m justify-content-center">

        <div class="col-sm-10 bg-mgray text-left divider-x shadow-5"> 
          <div class="form-group form-inline ml-4">
            <label for="exampleInputEmail1">Current databases</label>
           </div>
           <div class="container">
            <div class="row">
              <div class="col-sm-4 ml-2 text-gray">
                This window will show the current databases.<span class="icon ml-2"><i class="fa fa-list"></i></span>
              </div>
              <div class="col-sm">

              <div class="card scroll-1 scrollbar-ripe-malinka style="background-color: #232630;">
                <div id="databaseList" class="card-body text-gray">
                  <?php
                  include 'config/db.php';

                  // Query to fetch the list of databases
                  $query = 'SHOW DATABASES';
                  $result = $conn->query($query);

                  if ($result->num_rows > 0) {
                  echo '<script>';
                  echo 'var databaseList = document.getElementById("databaseList");';
                  echo 'var ul = document.createElement("ul");';

                  // Loop through the database rows and generate HTML list items
                  while ($row = $result->fetch_assoc()) {
                  echo 'var li = document.createElement("li");';
                  echo 'li.textContent = "' . $row['Database'] . '";';
                  echo 'ul.appendChild(li);';
                  }

                  echo 'databaseList.appendChild(ul);';
                  echo '</script>';
                  } else {
                  echo 'No databases found.';
                  }

                  // Close the database connection
                  $conn->close();
                  ?>  

                </div>
              </div>


              </div>
            </div>
           </div>
        </div>
        </div>

        <hr>

        <div class="row divider-m justify-content-center">

          <div class="col-sm-10 bg-mgray text-left divider-x shadow-5"> 
          <form>
            <div class="form-group form-inline ml-4">
              <label for="exampleInputEmail1">Delete database</label>
             </div>
             <div class="container">
              <div class="row">
                <div class="col-sm-4 ml-2 text-gray">
                  Deleting database will remove the database permanently.<span class="icon ml-2"><i class="fa fa-exclamation-triangle"></i></span>
                </div>
                <div class="col-sm">
                  <div class="form-group col-sm-10">
                      <label for="dbname">Database</label>
                      <input type="text" class="form-control text-light " id="dbname" placeholder="Enter database name">
                  </div>
  
                </div>  
              </div>
             </div>
              <div class="justify-content-right text-right mr-5 ml-20">
                  <button type="submit" class="btn btn-danger shadow-3">Delete</button>
              </div>
          </form>
          </div>
          </div>
  





   
</body>

</html>
