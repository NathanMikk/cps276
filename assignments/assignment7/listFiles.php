<?php

//THIS is list files
require_once "classes/listFilesProc.php";
$crud = new listFilesProc();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>PDO Crud Example</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  </head>
  <body>
    <main class="container">
      <h1>List Files</h1>

      <div class="form-group">
        <a href="https://russet-v8.wccnet.edu/~nmikkelson/cps276/assignments/assignment7/fileUpload.php">Add Files</a>
        <p><?php echo $crud->getFiles('list'); ?></p>
      </div>
    </main>    
  
  </body>
</html>
