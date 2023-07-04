<?php 
      $currentPage = 'users.php';
      include("header.php");

    ?> 




    <script>
        function displayPopup(message) {
            let c = message;
            document.getElementById("para").innerHTML = c;

        }
        function displayDelPopup(message) {
            let c = message;
            document.getElementById("para").innerHTML = c;

        }

        function createUser() {
            var username = document.getElementById("username").value;
            var location = document.getElementById("location").value;
            var password = document.getElementById("password").value;

            var formData = new FormData();
            formData.append("username", username);
            formData.append("location", location);
            formData.append("password", password);

            fetch("adduser.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => displayPopup(data.message))
            .catch(error => console.error(error));
        }
        
        function deleteUser() {
            var username = document.getElementById("delusername").value;

            var formData = new FormData();
            formData.append("username", username);

            fetch("deluser.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => displayDelPopup(data.message))
            .catch(error => console.error(error));
        }

    </script>











      <!-- content goes here -->

      <div class="container-fluid fill-100">
    
        <h2>User Management</h2>
        
        <hr>
    
        <div class="row divider-m justify-content-center">

        <div class="col-sm-10 bg-mgray text-left divider-x"> 

        <form method="POST">
          <div class="form-group form-inline ml-4">
            <label>Create a new User</label>
           </div>
           <div class="container">
            <div class="row">
              <div class="col-sm-4 ml-2 text-gray">
                You can create a new user here<span class="icon ml-2"> <i class="fas fa-user "></i></span>
              </div>
              <div class="col-sm">
                <div class="form-group col-sm-10">
                    <label for="username">Username </label>
                    <input type="text" class="form-control text-light" name="username" id="username" placeholder="Enter User name" required>
                </div>

                <div class="form-group col-sm-10">
                    <label for="path">Path</label>
                    <input type="text" class="form-control text-light" name="path" id="location" placeholder="Enter path for user">
                </div>
                <div class="form-group col-sm-10">
                    <label for="password">Password</label>
                    <input type="text" class="form-control text-light" name="password" id="password" placeholder="Enter password" required>
                </div>
              </div>
            </div>
           </div>
           
           </form>
           <div class="justify-content-right text-right mr-5 ml-20">
                <button type="submit" class="btn btn-primary" onclick="createUser()">Create</button>
            </div>
         
            


              <div class="popup-notification popup-error ">
                  <p class="popup-center" id="para">
                  <div class="popup-close">&times;</div>
              </div> 



        <script>
          $('.popup-close').on('click', function() {
            $('.popup-notification').hide();
          });
          
          $('.btn-primary').on('click', function() {
            $('.popup-notification').show();
            setTimeout(function() { $('.popup-notification').hide(); }, 5000)
          
          });
          
          
          </script>



            
        </div>
        </div>


        <hr>

        <div class="row divider-m justify-content-center">

        <div class="col-sm-10 bg-mgray text-left divider-x"> 
          <div class="form-group form-inline ml-4">
            <label for="exampleInputEmail1">Logs</label>
           </div>
           <div class="container">
            <div class="row">
              <div class="col-md-12 ml-2 text-gray">
                This window will show the logs.<span class="icon ml-2"><i class="fa fa-list"></i></span>
              </div>
        </div>
              <div class="row">

              <div class="col-md-12 text-center justify-content-right mt-3">
                <button type="submit" class="btn btn-primary ml-3" onclick="webServerLogs()">NGINX</button>
                <button type="submit" class="btn btn-primary ml-3" onclick="phpLogs()">PHP</button>
                <button type="submit" class="btn btn-primary ml-3" onclick="mysqlLogs()">MYSQL</button>


            </div>
           
        </div>
            </div>
           </div>
        </div>
        </div>

        <hr>

        <div class="row divider-m justify-content-center">

          <div class="col-sm-10 bg-mgray text-left divider-x"> 
          <form method="POST">
            <div class="form-group form-inline ml-4">
              <label for="exampleInputEmail1">Delete website</label>
             </div>
             <div class="container">
              <div class="row">
                <div class="col-sm-4 ml-2 text-gray">
                  Deleting website will remove the website permanently.<span class="icon ml-2"><i class="fa fa-exclamation-triangle"></i></span>
                </div>
                <div class="col-sm">
                  <div class="form-group col-sm-10">
                      <label for="username">website</label>
		      <input type="text" class="form-control text-light" name="username" id="delusername" placeholder="Enter Domain name" required>
                  </div>
  
                </div>  
              </div>
             </div>
            
          </form>
          <div class="justify-content-right text-right mr-5 ml-20">
                  <button type="submit" class="btn btn-danger" onclick="deleteUser()">Delete</button>
              </div>

              



        <script>
          $('.popup-close').on('click', function() {
            $('.popup-notification').hide();
          });
          
          $('.btn-danger').on('click', function() {
            $('.popup-notification').show();
            setTimeout(function() { $('.popup-notification').hide(); }, 5000)
          
          });
          
          
          </script>
          </div>
          </div>
  





   
</body>

</html>
