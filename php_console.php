<?php 
      $currentPage = 'php_console.php';
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
    
        <h2>Manage PHP</h2>
        
        <hr>
    
        <div class="row divider-m justify-content-center">

        <div class="col-sm-10 bg-mgray text-left divider-x"> 

        <form method="POST">
          <div class="form-group form-inline ml-4">
            <label>Create a new User</label>
           </div>
           <div class="container">
            <div class="row">
              <div class="col-sm-4 text-gray">
                Select PHP version<span class="icon ml-2"> <i class="fab fa-php "></i></span>
                <select id="inputState" class="form-control mt-2">
                    <option class="text-light" selected>Default</option>
                    <option class="text-gray">7.3</option>
                    <option class="text-gray">7.4</option>
                    <option class="text-gray">8.0</option>
                </select>
              </div>

              
              <div class="col-sm ml-2">
                <div class="form-group col-sm-10">
                    <label for="username">Upload Limit </label>
                    <input type="text" class="form-control text-light" name="username" id="username">
                </div>

                <div class="form-group col-sm-10">
                    <label for="path">Memory Limit</label>
                    <input type="text" class="form-control text-light" name="path" id="location">
                </div>
                <div class="form-group col-sm-10">
                    <label for="password">Max Execution Time</label>
                    <input type="text" class="form-control text-light" name="password" id="password">
                </div>
              </div>
            </div>
           </div>
           
           </form>
           <div class="justify-content-right text-right mr-5 ml-20">
                <button type="submit" class="btn btn-primary" onclick="createUser()">Create</button>
            </div>
         
            
            <div class="popup-notification  ">
              <div class="popup-child popup-success">
                  <p class="popup-center" id="para">
                  <div class="popup-close">&times;</div>
                </div>
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


      
      


     
          </div>
          </div>
  





   
</body>

</html>
