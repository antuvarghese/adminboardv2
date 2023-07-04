<?php 
      $currentPage = 'create_websites.php';
      include("header.php");

    ?> 



      <!-- content goes here -->


      <script>
        function displayPopup(message) {
            let c = message;
            document.getElementById("para").innerHTML = c;

        }


        function createWebsite() {
            var domain = document.getElementById("domain").value;
            var username = document.getElementById("username").value;
            var password = document.getElementById("phpversion").value;

            var formData = new FormData();
            formData.append("domain", domain);
            formData.append("username", username);
            formData.append("phpversion", password);

            fetch("website-user.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => displayPopup(data.message))
            .catch(error => console.error(error));
        }
        


    </script>






<div class="container-fluid fill-100">
    
    <h2 id="myD">Create website</h2>
    
    
    <hr>

    <div class="row divider-m justify-content-center">

    <div class="col-sm-10 bg-mgray text-left divider-x"> 
    <form>
      <div class="form-group form-inline ml-4">
        <label for="exampleInputEmail1">Create a new website</label>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-4 ml-2 text-gray">
            You can create a new website here<span class="icon ml-2"> <i class="fas fa-globe "></i></span><br><br>
            
            Note: The website will be created under the selected user's path.
          </div>
          <div class="col-sm">
            <div class="form-group col-sm-10">
                <label for="domain">Domain name</label>
                <input type="text" class="form-control text-light" id="domain" name="domain" placeholder="Enter domain name">
            </div>

            <div class="form-group col-sm-10">
                <label for="webuser">User</label>
                <input type="text" class="form-control text-light" id="username" name="username" placeholder="Enter username">
            </div>
            <div class="form-group col-sm-10">
                <label for="webpassword">PHP Version (optional)</label>
                <select id="phpversion" name="phpversion" class="form-control mt-2">
                    <option class="text-light" selected>Default</option>
                    <option class="text-gray">7.3</option>
                    <option class="text-gray">7.4</option>
                    <option class="text-gray">8.0</option>
                </select>
            </div>
          </div>
        </div>
       </div>
        <div class="justify-content-right text-right mr-5 ml-20">
            <button type="submit" class="btn btn-primary" onclick="createWebsite()">Create</button>
        </div>
    </form>

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