<?php 
function git_pull(){
    try{
        include('Net/SSH2.php');

    $ssh = new Net_SSH2('www.domain.tld');
    $ssh->login('admin', 'Passi2003');

    $ssh->read('[prompt]');
    $ssh->write("sudo git pull\n");
    $ssh->read('Password:');
    $ssh->write("Passi2003\n");
    echo $ssh->read('[prompt]');
        return "Pulled from GitHub";
    }
    catch(Excepetion $e){
        $error = "Error: " + $e;
        return $error;
    }
}