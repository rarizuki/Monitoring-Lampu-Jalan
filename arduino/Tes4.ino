#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266HTTPClient.h>
//----------------------------------------

#define LAMPU1 "D1"  //--> DEFINISIKAN LAMPU D1

#define LAMPU2 D2 //--> DEFINISIKAN LAMPU D2

//----------------------------------------NAMA DAN PASSWORD WIFI
const char* ssid = "Resmi"; //--> NAMA WIFI
const char* password = "55443321"; //--> PASSWORD WIFI
//----------------------------------------

//----------------------------------------ALAMAT WEB SERVER(IPv4)
//Cek IPv4 dengan cara Ctrl+R dan ketikan cmd kemudian masukan perintah ipconfig
const char *host = "http://192.168.43.245/";
//----------------------------------------

void setup() {
  //Setup Code
  Serial.begin(115200);
  delay(500);

  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password); //--> Connect ke wifi
  Serial.println("");
  
  pinMode(LAMPU1,OUTPUT); //--> On Board LED port Direction output
  digitalWrite(LAMPU1, HIGH); //--> Turn off Led On Board
  pinMode(LAMPU2,OUTPUT); //--> On Board LED port Direction output
  digitalWrite(LAMPU2, HIGH); //--> Turn off Led On Board
  //pinMode(LAMPU2,OUTPUT); //--> LED port Direction output
  //digitalWrite(LAMPU2, LOW); //--> Turn off Led

  //----------------------------------------Menunggu Koneksi
  Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    //----------------------------------------Mengkalibrasi Lampu ketika konek ke wifi
    digitalWrite(LAMPU1, LOW);
    delay(250);
    digitalWrite(LAMPU1, HIGH);
    delay(250);
    digitalWrite(LAMPU2, LOW);
    delay(250);
    digitalWrite(LAMPU2, HIGH);
    delay(250);
    //----------------------------------------
  }
  //----------------------------------------
  digitalWrite(LAMPU1, HIGH); //--> Mematikan Lampu ketika berhasil konek ke wifi
  
  Serial.println("");
  Serial.print("Successfully connected to : ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
  Serial.println();
  //----------------------------------------
}

void loop() {
  // put your main code here, to run repeatedly:
  HTTPClient http; //--> Mendeklarasi objek ke httpclient

  //----------------------------------------Mengambil data dari database
  String GetAddress, LinkGet, getData;
  int id = 0; //--> mengambil id dari db
  GetAddress = "gis/lokasi/bacaperintah"; 
  LinkGet = host + GetAddress; 
  getData = "ID=" + String(id);
  Serial.println("----------------Koneksi ke server-----------------");
  Serial.println("Get LED Status from Server or Database");
  Serial.print("Request Link : ");
  Serial.println(LinkGet);
  http.begin(LinkGet); //--> Specify request destination
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header
  int httpCodeGet = http.POST(getData); //--> Send the request
  String payloadGet = http.getString(); //--> Get the response payload from server
  String payloadAmbil = http.getString(); //--> Get the response payload from server
  Serial.print("Response Code : "); //--> Jika Code Respon 200 = OK
  Serial.println(httpCodeGet); //--> Print HTTP return code
  Serial.print("Returned data from Server : ");
  Serial.println(payloadGet); //--> Print request response payload
  Serial.println(payloadAmbil); //--> Print request response payload

  if (payloadGet == "OFF") {
    digitalWrite(LAMPU1, HIGH); //--> Turn off Led
  }
  if (payloadGet == "ON") {
    digitalWrite(LAMPU1, LOW); //--> Turn on Led
  }
  //----------------------------------------
  
  Serial.println("----------------Closing Connection----------------");
  http.end(); //--> Close connection
  Serial.println();
  Serial.println("Please wait 5 seconds for the next connection.");
  Serial.println();
  delay(5000); //--> GET Data at every 5 seconds
}
