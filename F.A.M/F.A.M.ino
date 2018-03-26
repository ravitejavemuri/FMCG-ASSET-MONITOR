#include <dht.h>
dht DHT;
#include <SoftwareSerial.h>
SoftwareSerial gprsSerial(D1, D2);
int chk,i2,i3,temp;
String str;
String dat1,dat2;




void setup()
{
  gprsSerial.begin(9600); 
  Serial.begin(9600);
  pinMode(D0,INPUT);
  pinMode(D5,INPUT);

 
  gprsSerial.flush();
  Serial.flush();

 // attach or detach from GPRS service 
  gprsSerial.println("AT+CGATT?");
  delay(100);
  toSerial();
  
  // bearer settings
  gprsSerial.println("AT+SAPBR=3,1,\"CONTYPE\",\"GPRS\"");
  delay(2000);
  toSerial();

  // bearer settings
  gprsSerial.println("AT+SAPBR=3,1,\"APN\",\"internet\"");
  delay(2000);
  toSerial();

  // bearer settings
  gprsSerial.println("AT+SAPBR=1,1");
  delay(2000);
  toSerial();
    
    // Sim Loc
   gprsSerial.println("AT+CIPGSMLOC=1,1");
   delay(2000); 
     SerialLoc(); 
   // toSerial();
   delay(2000); 
 
   

}


void loop()
{ 
   chk=DHT.read11(D5);
  i2=digitalRead(D0);
  i3=digitalRead(D6);
  temp=DHT.temperature;
  Capture();

  
  if(i2==1)
  {
   // initialize http service
   gprsSerial.println("AT+HTTPINIT");
   delay(200); 
   toSerial();

   // set http param value
   gprsSerial.println("AT+HTTPPARA=\"URL\",\"http://steelmountain.netau.net/store.php?temp="+ String(temp)+"&door="+ String(i2)+"&prod="+String(i3)+"&lat="+ dat1+"&lon="+dat2+"\"");   
   delay(200);
   toSerial();

   // set http action type 0 = GET, 1 = POST, 2 = HEAD
   gprsSerial.println("AT+HTTPACTION=0");
   delay(600);
   toSerial();

   // read server response
   gprsSerial.println("AT+HTTPREAD"); 
   delay(100);
   toSerial();

  // gprsSerial.println("");
   gprsSerial.println("AT+HTTPTERM");
   toSerial();
   delay(300);

   gprsSerial.println("");
   delay(1000);
  }
}

void toSerial()
{
  while(gprsSerial.available()!=0)
  {
    Serial.write(gprsSerial.read());
  }
}



void SerialLoc()
{
  
  while(gprsSerial.available()!=0)
  {
   str=gprsSerial.readString();
       Serial.print(str);
    
  }
}

void Capture()
{  
   dat2=str.substring(33,42);
    dat1=str.substring(43,52);

//Serial.println(dat1);
//Serial.println(dat2);
  
  
  delay(7000);
}

