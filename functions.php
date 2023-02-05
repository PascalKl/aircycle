<?php 
function git_pull(){
    try{
	return shell_exec("/var/www/html/aircycle/pull.sh 2>&1; echo $?");
}
catch(Excepetion $e){
        $error = "Error: " + $e;
        return $error;
    }
}
