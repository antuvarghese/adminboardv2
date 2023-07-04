<?php 
  $currentPage = 'wordpress.php';
  include("header.php");

?> 



<!-- content goes here -->
      
<div class="container-fluid fill-100">

<h2 class="text-gray">Wordpress Installation</h2>

<hr>
<div class="col-sm-10 bg-mgray p-4 divider-x shadow-5">
<div class="float-right mt-4 mr-5">
  <img src="assets/images/wp.png" alt="WordPress" width="50" height="50">

</div>
  <form class="text-center">
    <div class="form-group form-inline ml-5">
      <label for="exampleInputEmail1">Domain</label>
      <input type="text" class="form-control ml-4 text-light" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter domain name">
    </div>
    
    
    <div class="form-group form-inline ml-5">
      <script>
        $('button').on('click', function(){
          $('button').removeClass('selected');
          $(this).addClass('selected');
        });
      </script>
      <label for="exampleInputPassword1">PHP</label>
      <select id="inputState" class="form-control ml-5">
        <option class="text-light" selected>Default</option>
        <option class="text-gray">7.3</option>
        <option class="text-gray">7.4</option>
        <option class="text-gray">8.0</option>
      </select>
      <script>
        $('select').on('click', function(){
            $('select').removeClass('selected');
            $(this).addClass('selected');
        });
      </script>
    </div>
    <button type="submit" class="btn btn-primary ml-3 shadow-3">Install</button>
  </form>
  </div>
  <hr>
</div>

</body>

</html>