#include "WiFiEsp.h"

#ifndef HAVE_HWSERIAL1
#include "SoftwareSerial.h"
SoftwareSerial Serial1(7, 8); // Datenpins 
#endif

char ssid[] = "";            // WLAN SSID
char pass[] = "";        // WLAN Passwort
int status = WL_IDLE_STATUS;     // WLAN Status

char server[] = ""; // Bei mir war es ein Server auf einem Raspberry Pi

// Schalte WLAN ein
WiFiEspClient client;

void setup()
{
  // Port zum debuggen und Konsole
  Serial.begin(9600);
  // Port dem Board zuweisen
  Serial1.begin(9600);
  // Board mit WLAN verbinden
  WiFi.init(&Serial1);

  // Prüfen ob WLAN Modul vorhanden ist
  if (WiFi.status() == WL_NO_SHIELD) {
    Serial.println("WLAN Modul nicht vorhanden");
    // nicht vorhanden
    while (true);
  }

  // versuche mit WLAN zu verbinden
  while ( status != WL_CONNECTED) {
    Serial.print("Versuche mit WLAN zu verbinden:");
    Serial.println(ssid);
    // verbinde mit WLAN
    status = WiFi.begin(ssid, pass);
  }

  // Bei erfolgreicher Verbindung, Konsolenausgabe
  Serial.println("Ich bin mit dem WLAN verbunden! ");

  printWifiStatus();

    Serial.println();
    // API Key
    String api_key="tPmAT5Ab3j7F9";
    //Sensor Daten
    String name = String(WiFi.macAddress());
    String location = String(analogRead(pinMode(A7,OUTPUT))); // GPS Sensor, bei mir auf A7
    String airquality = String(analogRead(pinMode(A0,OUTPUT))); // Luftqualitätssensor, bei mir auf A0
    String readingtime = String(getTime());
    String radius = "50"; // Radius der Messung hängt vom Einsatztyp und der Umgebung ab, deswegen kein Pauschalwert. Ich hatte auf dem Fahrrad einen Radius von 50.

    // Verbindung zum Server
    int    HTTP_PORT   = 80;
    char   HOST_NAME[] = "192.168.1.108"; // RaspberryPi als Server
    String PATH_NAME   = "/aircycle/post-aircycle-data.php";
    String queryString = String("?api:key=") + String(api_key) + String("?name=") + String(name) + String("&location=") + String(location) + String("&airquality=") + String(airquality) + String("&readingtime=") + String(readingtime) + String("&radius=") + String(radius);
    
    // Verbindungsaufbau
    if(client.connect(HOST_NAME, HTTP_PORT)) {
    Serial.println("Mit Sever verbunden");
    // sende API Request
    client.println("POST " + PATH_NAME + queryString + " HTTP/1.1");
    client.println("Host: " + String(HOST_NAME));
    client.println("Verbindung: getrennt");
    client.println(); // schließe Verbindung

    } else {
    Serial.println("Verbindung fehlgeschlagen");

    }

}
// Bekomme aktuelle Zeit
// Quelle: https://randomnerdtutorials.com/epoch-unix-time-esp32-arduino/
unsigned long getTime() {
  time_t now;
  struct tm timeinfo;
  if (!getLocalTime(&timeinfo)) {
    return(0);
  }
  time(&now);
  return now;
}

// Debug Funktion, da ich Probleme beim Aufbau zum Netzwerk hatte
void printWifiStatus()
{
  // SSID ausgeben
  Serial.print("SSID: ");
  Serial.println(WiFi.SSID());

  // IP Adresse ausgeben
  IPAddress ip = WiFi.localIP();
  Serial.print("IP Address: ");
  Serial.println(ip);

  // Signalstärke ausgeben
  long rssi = WiFi.RSSI();
  Serial.print("Signal strength (RSSI):");
  Serial.print(rssi);
  Serial.println(" dBm");
}