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
function getDevices()
{
    $conn = connect();
    $sql = "SELECT * FROM `devices`;";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}
function getData(){
    $conn = connect();
    $sql = "SELECT * FROM `SensorData` WHERE `reading_time` + INTERVAL 30 DAY > NOW()";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        $name = $row["name"];
        $location = $row["location"];
        $lat = explode(", ", $location)[0];
        $lng = explode(", ", $location)[1];
        $airquality = $row["airquality"];
        $radius = $row["radius"];
        if($radius == NULL){
            $radius = 100;
        }
        $data .= "'$name':{
            lat: $lat, 
            lng: $lng,
            airquality: $airquality,
            radius: $radius
        },
        ";
    }
    $conn->close();
    return $data;
}
