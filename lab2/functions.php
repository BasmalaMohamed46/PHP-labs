<?php
require_once("vendor/autoload.php");
function store_submits_to_file($name,$email,$visitDate)
{
    $data = $visitDate . "," .$_SERVER["REMOTE_ADDR"].",". $email . "," . $name .PHP_EOL;
    $file = fopen(LOG_FILE, "a+") ;
    if($file){
        if(fwrite($file, $data)){
        fclose($file);
        return true;
        }
        else{
        return false;  
        }
    }
    else{
        return false;
    }
}

function display_all_submits(){
    $lines=file(LOG_FILE);
    foreach($lines as $line){
        echo "<h3>New User Details</h3>";
        $userData=explode(",",$line);
        $i=0;
        foreach($userData as $data){
          switch($i){
            case 0:
                echo "<h5>Visit Date:$data</h5>";
                break;
            case 1:
              echo "<h5>IP Address:$data</h5>";
              break;
            case 2:
              echo "<h5>Email:$data</h5>";
              break;
            case 3:
              echo "<h5>Name:$data</h5>";
              break;
            }
        $i++;
        }
    echo "<hr>";
   }
}
?>