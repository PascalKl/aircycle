<?php 
function git_pull(){
    try{
        shell_exec("git pull");
    }
    catch(Excpetion $e){
        $error = "Error: " + $e;
        echo $error;
        return $error;
    }
}