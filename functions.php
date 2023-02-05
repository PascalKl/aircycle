<?php 
function git_pull(){
    try{
        shell_exec("git pull");
        return "Pulled from GitHub";
    }
    catch(Excpetion $e){
        $error = "Error: " + $e;
        return $error;
    }
}