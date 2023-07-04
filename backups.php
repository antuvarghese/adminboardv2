<?php 
      $currentPage = 'backups.php';
      include("header.php");

    ?> 




      <!-- content goes here -->

      <div class="container-fluid fill-100">
    
        <h2 class="text-gray">BACKUPS</h2>
        
        <hr>
    
        <div class="row divider-m justify-content-center">

        <div class="col-sm-10 bg-mgray text-left divider-x shadow-5"> 
        <form>
          <div class="form-group form-inline ml-4">
            <label for="exampleInputEmail1">Create local backup</label>
           </div>
           <div class="container">
            <div class="row">
              <div class="col-sm-4 ml-2 text-gray">
                You can create the backups here<span class="icon ml-2"> <i class="far fa-window-restore "></i></span>
              </div>
              <div class="col-sm">
                <div class="form-group col-sm-10">
                    <label for="dbname">Backup Location</label>
                    <input type="text" class="form-control text-light" id="dbname" placeholder="Enter the path for backups (Default: /backups)">
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

      

        <div class="row divider-m justify-content-center">

<div class="col-sm-10 bg-mgray text-left divider-x shadow-5"> 
<form>
  <div class="form-group form-inline ml-4">
    <label for="exampleInputEmail1">Create remote backups</label>
   </div>
   <div class="container">
    <div class="row">
      <div class="col-sm-4 ml-2 text-gray">
        Remote backups use the ssh protocol for the remote connection. Ensure the ssh connection to the remote backup machine.<span class="icon ml-2"> <i class="fas fa-tv "></i></span>
      </div>
      <div class="col-sm">
        <div class="form-group col-sm-10">
            <label for="dbname">Backup server IP</label>
            <input type="text" class="form-control text-light" id="dbname" placeholder="Enter IP of the remote machine">
        </div>

        <div class="form-group col-sm-10">
            <label for="dbuser">User</label>
            <input type="text" class="form-control text-light" id="dbuser" placeholder="username to connect backup server">
        </div>
        <div class="form-group col-sm-10">
            <label for="dbpassword">Password</label>
            <input type="text" class="form-control text-light" id="dbpassword" placeholder="password of the backup server user">
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


          




   
</body>

</html>
