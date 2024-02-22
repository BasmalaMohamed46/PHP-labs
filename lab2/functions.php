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
        echo "<h5>Visit Date:$userData[0]</h5>";
        echo "<h5>IP Address:$userData[1]</h5>";
        echo "<h5>Email:$userData[2]</h5>";
        echo "<h5>Name:$userData[3]</h5>";
        
    echo "<hr>";
   }
}
?>