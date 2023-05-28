<?php

// Verbindungsdaten
$servername = "localhost";
$dbname = "aircycle_data";
$username = "module_poster";
$password = "1czSR8VkZMUYzMy9kFdc";
$api_key_value = "tPmAT5Ab3j7F9"; // API key zum identifizieren des Arduino

$api_key= $name = $location = $airquality = $reading_time = $radius = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $name = test_input($_POST["name"]);
        $location = test_input($_POST["location"]);
        $airquality = test_input($_POST["airquality"]);
        $reading_time = test_input($_POST["reading_time"]);
        $radius = test_input($_POST["radius"]);
        
        
       // Verbindung mit der Datenbank herstellen
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Verbindung überprüfen
        if ($conn->connect_error) {
            die("Verbindung fehlgeschlagen: " . $conn->connect_error);
        } 
        // Daten in die Datenbank schreiben
        $sql = "INSERT INTO SensorData (name, location, airquality, reading_time, radius)
        VALUES ('" . $name . "', '" . $location . "', '" . $airquality . "', '" . $reading_time ."', '" . $radius ."')"; // Datensatz festlegen
        if ($conn->query($sql) === TRUE) {
            echo "Daten erfolgreich gespeichert.";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Falscher API Key.";
    }

}
else {
    echo "Keine Daten empfangen.";
}

// Funktion zum überprüfen der Daten & zum entfernen von Leerzeichen oder ungültigen Zeichen
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
