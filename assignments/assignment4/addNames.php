<?php

class AddNames{
    public function addClearNames() {

        $output="";

        if(isset($_POST['addButton'])) {
            if(isset($_POST['names'])) {
                $nameArray = explode(" ", $_POST['names']);
            }

            $name = $nameArray[1].", ".$nameArray[0];
            $newNameArray = explode("\n", $_POST['namesArray']);
            array_push($newNameArray, $name);
            sort($newNameArray);
            $output = implode("\n", $newNameArray);
        
        }else if(isset($_POST['clearButton'])) {
            $output = "";
        }
        return $output;
    }
}
?>