<?php

require_once 'Pdo_methods.php';

class Date_time extends PdoMethods{

    public function checkSubmit(){

	    $getDateTime = isset($_POST['dateTime']) ? $_POST['dateTime'] : '';
	    $note = isset($_POST['notes']) ? $_POST['notes'] : '';
	    $date_time = strtotime($getDateTime);

        if(!$date_time || !$note){
            
            return "You did not enter all required fields.";
        }
		
		$pdo = new PdoMethods();

		$sql = "INSERT INTO time_notes (date_time, note) VALUES (:dtime, :fnote)";
		 
	    $bindings = [
			[':dtime',$date_time,'str'],
			[':fnote',$note,'str']
		];

		$result = $pdo->otherBinded($sql, $bindings);

		if($result === 'error'){
			return 'There was an error adding user input';
		}
		else {
			return 'Input has been added';
		}


	}

    //add another function to display the table. should set up very similarly to checkSubmit and
    //he provided the query
    public function getTable(){

        $getBegDate = isset($_POST['begDate']) ? $_POST['begDate'] : '';
	    $getEndDate = isset($_POST['endDate']) ? $_POST['endDate'] : '';
	    $begDate =  strtotime($getBegDate);
        $endDate =  strtotime($getEndDate);
        //var_dump($begDate, $endDate); //check values
        $table = "";

        $pdo = new PdoMethods();

        $sql = "SELECT date_time, note FROM time_notes WHERE date_time BETWEEN :begDate AND :endDate ORDER BY date_time DESC";

        $bindings = [
			[':begDate',$begDate,'int'],
			[':endDate',$endDate,'int']
		];

        $result = $pdo->selectBinded($sql, $bindings);

        if($result === 'error'){
			return 'There has been and error processing your request';
		}
		else {
            if(is_array($result)){
                foreach($result as $key => $row){
                    $result[$key]['date_time'] = date("m-d-y h:i a", strtotime($row['date_time']));
                }
                return $this->makeTable($result);	
            }
            else {
                return 'no table found';
            }
        }

    }

   
    private function makeTable($result){

        $table = "<table class='table table-bordered table-striped'><thead><tr>";
		$table .= "<th>Date and Time</th><th>Note</th><tr><thread><tbody>";

		foreach ($result as $row){
            $table .= "<tr><td>{$row['date_time']}</td>";
            
            $table .= "<td>{$row['note']}</td></tr>";
		}
		
		$table .= "</tbody></table></form>";
		return $table;
    }

}


?>