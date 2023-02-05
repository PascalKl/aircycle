<?php

function connect()
{
    $servername = "localhost";

    $dbname = "aircycle_data";
    $username = "module_poster";
    $password = "1czSR8VkZMUYzMy9kFdc";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{
        return $conn;
    }
}
function close($conn){
    $conn->close();
}
function getDevices()
{
    $conn = connect();
    $sql = "SELECT * FROM 'devices'";
    $return = $conn->query($sql);
    close($conn);
    return $return;
}
