<?php

class Directories{
    public function checkDirectory(){
        $message = "";
        $path = "";

        if(isset($_POST['submitButton'])) {
            $newFolderName = ($_POST['inputFolderName']);
            $newFileContent = ($_POST['fileContent']);
            $fileName = 'readme.txt';
            $newDirectory = "directories/".$newFolderName;
            $filepath = $newDirectory."/".$fileName;
            //$path = $filepath;

            if(isset($_POST['inputFolderName'])) { 
                $success = mkdir($newDirectory);
                chmod($newDirectory,0777);
                 
                if($success){
                    $message = "File and directory were created.";
                    $path = "<p><a href='$filepath'>Path to file<a></p>";
                }else{
                    $message = "A directory already exists with that name.";
                    $path = "";
                }  
            }
            
            if(isset($_POST['fileContent'])){
                
                fopen("readme.txt","w+");
                file_put_contents($filepath,$newFileContent);
                
            }
            return $path;
            
        }
        return $message;
    }
}


?>