<?php 
      $currentPage = 'firewall.php';
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
    
        <h2 class="pt-3">Firewall</h2>
        
        <hr>
    
        <div class="row divider-m justify-content-center">
        <div class="col-sm-10 mb-0 pt-3 text-center shadow-5" style="margin:0;background-color:#232630;">

<h6>WHITELIST</h6>
    </div>
        <div class="col-sm-10 bg-mgray text-left mt-0 pt-3 shadow-5"> 
      
        <form>
  <div class="form-group row">
    <label for="ip" class="col-sm-2 col-form-label">Source IP</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fip" placeholder="Enter the IP to allow">
    </div>
  </div>
  
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0 text-gray">Port</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
          <label class="form-check-label" for="gridRadios1">
            SSH
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
            HTTP(80)
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
            HTTPS(443)
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  <div class="form-group row">
    <label for="ip" class="col-sm-2 col-form-label">Custom Port</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="fport" placeholder="Enter the Port to allow">
    </div>
  </div>

 
  <div class="form-group row">
    <div class="col-sm-11 justify-content-right text-right">
      <button type="submit" class="btn btn-primary">Add Rule</button>
    </div>
  </div>
</form>
         
            


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

        <div class="col-sm-10 mb-0 pt-3 text-center shadow-5" style="margin:0;background-color:#232630;">

<h6>BLACKLIST</h6>
    </div>
        <div class="col-sm-10 bg-mgray text-left mt-0 pt-3 shadow-5"> 
      
        <form>
  <div class="form-group row">
    <label for="ip" class="col-sm-2 col-form-label">Source IP</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fip" placeholder="Enter the IP to allow">
    </div>
  </div>
  
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0 text-gray">Port</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
          <label class="form-check-label" for="gridRadios1">
            SSH
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
            HTTP(80)
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
            HTTPS(443)
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  <div class="form-group row">
    <label for="ip" class="col-sm-2 col-form-label">Custom Port</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="fport" placeholder="Enter the Port to allow">
    </div>
  </div>

 
  <div class="form-group row">
    <div class="col-sm-11 justify-content-right text-right">
      <button type="submit" class="btn btn-primary">Add Rule</button>
    </div>
  </div>
</form>


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
  

          <hr>

<div class="row divider-m justify-content-center">

<div class="col-sm-10 bg-mgray text-left divider-x shadow-5"> 
  <div class="form-group form-inline ml-4">
    <label>Current Rules</label>
   </div>
   <div class="container">
    <div class="row">
      
      <div class="col-sm">

      <div class="card scroll-1 scrollbar-ripe-malinka style="background-color: #232630;">
        <div id="databaseList" class="card-body text-gray">
        <?php

        //Store the output of the executed command in an array

        //exec('sudo ufw status numbered', $output, $status);
        exec('date', $output, $status);

        //Print the output of the executed command in each line

        foreach($output as $value)
        {

                echo $value."<br />";
        }

        ?>  

        </div>
      </div>


      </div>
    </div>
   </div>
</div>
</div>



   
</body>

</html>
