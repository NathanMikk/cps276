<?php

$output = "";

if(isset($_POST['uploadFile'])){
    require_once "classes/fileUploadProc.php";
    $crud = new fileUploadProc();
    $output = $crud->processFile($_FILES['file']); 
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>File Upload</title>
    
  </head>
  <body>
    <main class="container">
      <h1>File Upload</h1>

        <form action="classes/fileUploadProc.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <a href="https://russet-v8.wccnet.edu/~nmikkelson/cps276/assignments/assignment7/listFiles.php">File List</a>
                <p><?php echo $output ?></p>
            </div>

            <div class="form-group">
      		    <label for="fileName">File Name</label>
      		    <input type="text" class="form-control" name="fileName" id="fileName">
      	    </div>

      	    <div class="form-group">
      		    <input type="file" name="file" id="file">
      	    </div>

      	    <div class="form-group">
      		    <input type="submit" class="btn btn-primary" name="uploadFile" id="uploadFile" value="Upload File"/>
      	    </div>

	    </form>

    </main>
</body>
</html>