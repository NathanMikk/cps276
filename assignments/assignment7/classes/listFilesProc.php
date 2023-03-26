<?php

require_once 'Pdo_methods.php';

class listFilesProc extends PdoMethods{

  function getFiles($type){
      
    /* CREATE AN INSTANCE OF THE PDOMETHODS CLASS*/
    $pdo = new PdoMethods();

    /* CREATE THE SQL */
    $sql = "SELECT * FROM pdf_files";

    //PROCESS THE SQL AND GET THE RESULTS
    $records = $pdo->selectNotBinded($sql);

    /* IF THERE WAS AN ERROR DISPLAY MESSAGE */
    if($records == 'error'){
      return 'There has been and error processing your request';
    }
    else {
      if(count($records) != 0){
        if($type == 'list'){return $this->createList($records);}
      }
      else {
        return 'no files found';
      }
    }
  }

  /*THIS FUNCTION TAKES THE DATA FROM THE DATABASE AND RETURN AN UNORDERED LIST OF THE DATA*/
  function createList($records){
    $list = '<ol>';
    foreach ($records as $row){
      $list .= "<li><a href={$row['file_path']}> {$row['file_name']} </a></li>";
    }
    $list .= '</ol>';
    return $list;
  }

  public function addFile($file_name, $file_path){
	
		$pdo = new PdoMethods();

		/* HERE I CREATE THE SQL STATEMENT I AM BINDING THE PARAMETERS */
		$sql = "INSERT INTO pdf_files (file_name, file_path) VALUES (:fname, :fpath)";

			 
	    /* THESE BINDINGS ARE LATER INJECTED INTO THE SQL STATEMENT THIS PREVENTS AGAIN SQL INJECTIONS */
	    $bindings = [
			[':fname',$file_name,'str'],
			[':fpath',$file_path,'str']
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