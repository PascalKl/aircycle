<?php

$servername = "localhost";

// REPLACE with your Database name
$dbname = "aircycle_data";
// REPLACE with Database user
$username = "module_poster";
// REPLACE with Database user password
$password = "1czSR8VkZMUYzMy9kFdc";

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";

$api_key= $name = $location = $airquality = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $name = test_input($_POST["name"]);
        $location = test_input($_POST["location"]);
        $airquality = test_input($_POST["airquality"]);
        
        
       
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
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
