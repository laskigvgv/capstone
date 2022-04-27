#!/usr/bin/python
#lazarzdravkoski
from sense_hat import SenseHat
import time
import sys

def get_weather():
    sense = SenseHat()
    sense.clear()
    sense.rotation = 90
    try:
       
        temp = sense.get_temperature()
        temp = round(temp, 1)
        print("Temperature C", temp) 


        humidity = sense.get_humidity()  
        humidity = round(humidity, 1)  
        print("Humidity :",humidity)  

        pressure = sense.get_pressure()
        pressure = round(pressure, 1)
        print("Pressure:",pressure)

        localtime = time.asctime( time.localtime(time.time()) )
        print ("Local current time :", localtime)
        
        red = (255 , 0 , 0)
        green = (0 , 255 , 0)
        blue = (0 , 0 , 255)

        # sense.show_message(str(temp) +" C",0.2,text_colour=red)
        # sense.show_message(str(humidity) + "%" ,0.2,text_colour=green)
        # sense.show_message(str(pressure) +"hPa",0.2,text_colour=blue)

        sense.clear()
        

    except Exception as error_msg:
        sense.clear()
        return {'error':error_msg}


