<?php

require 'listFilesProc.php';

class fileUploadProc{

	private $output;
	public function __construct(){
		$this->output = "";
	}

	public function processFile(){
		// I PUT THE PHOTO INTO A DIRECTORY NAMED PHOTOS WHICH IS ALREADY ON THE SERVER AND HAS 777 FILE PERMISSIONS
		
		//I HAD TO MAKE $OUTPUT A GLOBAL VARIBLE SO IT COULD BE USED INSIDE AND OUTSIDE THIS FUNCTION
		//global $output;
		$crud = new listFilesProc();
		
		//CHECK TO SEE IF A FILE WAS UPLOADED.  ERROR EQUALS 4 MEANS THERE WAS NO FILE UPLOADED
		if ($_FILES["file"]["error"] == 4){
			$this->output = "No file was uploaded. Make sure you choose a file to upload.";
		}
	
		/*MAKE SURE THE FILE SIZE IS LESS THAN 1000000 BYTES.  THE ERROR EQUALS ONE MEANS THE FILE WAS TOO BIG ACCORDING TO THE SETINGS IN
		post_max_size LOCATED IN THE PHP INI FILE.*/
		elseif($_FILES["file"]["size"] > 100000 || $_FILES["file"]["error"] == 1){
			$this->output = "The file is too large";
		}
	
		//CHECK TO MAKE SURE IT IS THE CORRECT FILE TYPE IN THIS CASE JPEG OR PNG
		elseif ($_FILES["file"]["type"] != "application/pdf") {
	
			$this->output = "<p>PDF files only, thanks!</p>";
		}

		elseif(!move_uploaded_file($_FILES["file"]["tmp_name"], "files/" . $_FILES["file"]["name"])){
			$this->output = "<p>Sorry, problem uploading.</p>";
		}

		else{
			$this->output = "<p>File is added.</p>";

			move_uploaded_file($_FILES["file"]["tmp_name"], "files/" . $_FILES["file"]["name"]);
			$file_name = isset($_POST['fileName']) ? $_POST['fileName'] : '';
			$file_path = "files/" . $_FILES["file"]["name"];
			$result = $crud->addFile($file_name,$file_path);

		}

	}

	public function getOutput(){
		return $this->output;
	}
	
}

?>
