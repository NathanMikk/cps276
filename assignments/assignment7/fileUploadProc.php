<?php
if (isset( $_POST["uploadFile"])){
	processFile();
}
else {
	$output = "";
}

function processFile(){
	// I PUT THE PHOTO INTO A DIRECTORY NAMED PHOTOS WHICH IS ALREADY ON THE SERVER AND HAS 777 FILE PERMISSIONS
	
	//I HAD TO MAKE $OUTPUT A GLOBAL VARIBLE SO IT COULD BE USED INSIDE AND OUTSIDE THIS FUNCTION
	global $output;
	
	//CHECK TO SEE IF A FILE WAS UPLOADED.  ERROR EQUALS 4 MEANS THERE WAS NO FILE UPLOADED
	if ($_FILES["file"]["error"] == 4){
		$output = "No file was uploaded. Make sure you choose a file to upload.";
	}

	/*MAKE SURE THE FILE SIZE IS LESS THAN 1000000 BYTES.  THE ERROR EQUALS ONE MEANS THE FILE WAS TOO BIG ACCORDING TO THE SETINGS IN
	post_max_size LOCATED IN THE PHP INI FILE.*/
	elseif($_FILES["file"]["size"] > 1000000 || $_FILES["file"]["error"] == 1){
		$output = "The file is too large";
	}

	//CHECK TO MAKE SURE IT IS THE CORRECT FILE TYPE IN THIS CASE JPEG OR PNG
	elseif ($_FILES["file"]["type"] != "application/pdf") {

		$output = "<p>PDF files only, thanks!</p>";
	}

	//IF ALL GOES WELL MOVE FILE FROM TEMP LCOATION TO THE PHOTOS DIRECTORY 
	elseif (!move_uploaded_file( $_FILES["file"]["tmp_name"], "files/" . $_FILES["file"]["name"])){
			$output = "<p>Sorry, there was a problem uploading that file.</p>";
	}
	else {
		//IF ALL GOES WELL CALL DISPLAY THANKS METHOD	
		$output = displayThanks();
	}

}

function displayThanks() {

/*
NOTICE I USE THE POST SUPERGLOBAL ARRAY TO GET THE NAME AND NOT
THE FLES SUPERGLOBAL ARRAY.  ALL FILES USE $_FILES ALL TEXT ENTERIES USE $_POST
*/

return <<<HTML
	<h1>Thank You!</h1>
	
	<p>Thanks  {$_POST['fileName']} for uploading your file!</p>
	<p>Here's your file:</p>
	<p><img src="files/{$_FILES['file']['name']}" alt="File"></p>
HTML;
	
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
      <p>Show File List *this will need to link to new page.</p>

      <form action="fileUploadProc.php" method="post" enctype="multipart/form-data">
      	<div class="form-group">
      		<label for="fileName">File Name</label>
      		<input type="text" class="form-control" name="fileName" id="fileName">
      	</div>
      	<div class="form-group">
      		<input type="file" name="file" id="file">
      	</div>
      	<div class="form-group">
      		<input type="submit" class="btn btn-primary" name="uploadFile" value="Upload File" />
      	</div>
		</form>

    </main>
</body>
</html>