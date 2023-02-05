<?php 
function git_pull(){
    try{
	echo shell_exec("/var/www/html/aircycle/pull.sh 2>&1; echo $?");
	//echo "Success! ";	
}
catch(Excepetion $e){
        $error = "Error: " + $e;
        return $error;
    }
}
