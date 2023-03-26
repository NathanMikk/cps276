<?php

require 'Pdo_methods.php';

class fileUploadProc extends PdoMethods{

	public function processFile(){
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

		$pdo = new PdoMethods();

		/* HERE I CREATE THE SQL STATEMENT I AM BINDING THE PARAMETERS */
		$sql = "INSERT INTO pdf_files (file_name, file_path) VALUES (:file_name, :file_path)";

			
		/* THESE BINDINGS ARE LATER INJECTED INTO THE SQL STATEMENT THIS PREVENTS AGAIN SQL INJECTIONS */
		$bindings = [
			[':file_name',$_POST['file_name'],'str'],
			[':file_path',$_POST['file_path'],'str'],
		];

		/* I AM CALLING THE OTHERBINDED METHOD FROM MY PDO CLASS */
		$result = $pdo->otherBinded($sql, $bindings);

		/* HERE I AM RETURNING EITHER AN ERROR STRING OR A SUCCESS STRING */
		if($result === 'error'){
			return 'There was an error adding the file';
		}
		else {
			return 'File has been added';
		}
	
	}
	

}

?>
