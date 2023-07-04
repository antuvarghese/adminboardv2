<!DOCTYPE html>
<html>
<head>
    <title>File Editor</title>
</head>
<body>
    <h1>File Editor</h1>
  

    <form id="editorForm" method="POST" action="save_file.php" enctype="multipart/form-data">
        <input type="file" name="file" id="fileInput" accept=".txt">
        <br><br>
        <textarea name="content" id="contentTextarea" rows="10" cols="50"></textarea>
        <br><br>
        <button type="submit">Save Changes</button>
    </form>
 

    <script>
        const fileInput = document.getElementById("fileInput");
        const contentTextarea = document.getElementById("contentTextarea");

        fileInput.addEventListener("change", function() {
            const file = fileInput.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                contentTextarea.value = e.target.result;
            };

            reader.readAsText(file);
        });
    </script>


</body>
</html>
