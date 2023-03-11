<?php

require_once 'addFile.php';
$addFile = new Directories();
$message = $addFile->checkDirectory();
$path = $addFile->checkDirectory();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <title>Assignment 5</title>
</head>
<body>
    <main class="container">

    <form method="post" action="addFile">
        <h1>File and Directory Assignment</h1>
        <div class="form-row">
            <div class="col">
                <label for="instructions">Enter a folder name and the contents of a file. Folder names should contain alpha numeric characters only.</label></br>
                <label for="message"><?php echo $message; ?></label></br>
                <lavel for="path"><?php echo $path; ?></lable>
            </div>
        </div>
              
        <div class="form-row">
            <div class="col">
                <label for="inputFolderName">Folder Name</label>
                <input type="text" class="form-control" name="inputFolderName" id="inputFolderName">
            </div>
        </div></br>

        <div class="form-row">
            <div class="col">
                <label for="fileContent">File Content</label>
                <input type="text" class="form-control" style="height: 200px;" 
                name="fileContent" id="fileContent">
            </div>    
        </div></br>

        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submitButton" 
            id="submitButton">Submit</button>
        </div>  
    </form>
</body>
</html>