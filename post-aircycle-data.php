<?php

$servername = "localhost";

$dbname = "aircycle_data";
$username = "module_poster";
$password = "1czSR8VkZMUYzMy9kFdc";
$api_key_value = "tPmAT5Ab3j7F9";

$api_key= $name = $location = $airquality = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $name = test_input($_POST["name"]);
        $location = test_input($_POST["location"]);
        $airquality = test_input($_POST["airquality"]);
        
        
       
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO SensorData (name, location, airquality)
        VALUES ('" . $name . "', '" . $location . "', '" . $airquality . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
