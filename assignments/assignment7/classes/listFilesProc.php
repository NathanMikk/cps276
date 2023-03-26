<?php

require_once 'Pdo_methods.php';

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
    $list .= "<li><a href={$row['file_name']} {$row['file_path']} </a></li>";
  }
  $list .= '</ol>';
  return $list;
}

	

?>