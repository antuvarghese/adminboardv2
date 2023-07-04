
<?php 
      $currentPage = 'config-editor.php';
      include("header.php");

    ?> 


    <h1>File Editor</h1>


<hr>


    <div class="row divider-m justify-content-center">


        <div class="col-sm-10 bg-mgray divider-x"> 
          <div class="form-group form-inline ml-4">
            <label for="exampleInputEmail1">Edit Config</label>
            <input type="text" class="bg-mgray ml-5" name="filename" id="fileInput" style= placeholder=" Path"> 
    <button id="openButton" class="btn btn-primary ml-3 mr-5">Open file</button>
    <button id="saveButton" class="btn btn-success justify-content-right" style="margin-left:220px;">Save Changes</button>


</div>

           <div class="container">
            <div class="row">
             
              <div class="col-sm">

              <div class="card" style="background-color: #232630;">
                <textarea class="card-body text-gray bg-mgray" id="contentTextarea" rows="15" cols="50"></textarea>

               </div>
              


<script>
    const fileName = document.getElementById("fileInput");
    const contentTextarea = document.getElementById("contentTextarea");
    const saveButton = document.getElementById("saveButton");

    // Make an AJAX request to save the file contents
    saveButton.addEventListener("click", function() {
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText);
            }
        };
        xhr.open("POST", "save_file.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("filename=" + encodeURIComponent(fileName.value) + "&content=" + encodeURIComponent(contentTextarea.value));
    });


    // Make an AJAX request to retrieve file contents
    openButton.addEventListener("click", function() {

    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const fileContents = xhr.responseText;
            contentTextarea.value = fileContents;
        }
    };
    xhr.open("GET", "save_file.php?filename=" + encodeURIComponent(fileName.value), true);
    xhr.send();
});

</script>


              </div>
            </div>
           </div>
        </div>
        </div>
</body>
</html>


