#!/usr/bin/python

from sense_hat import SenseHat
import sqlalchemy as sql
import time
import sys

# root@localhost:3306
# jdbc:mysql://localhost:3306/?user=root


def get_weather():
    sense = SenseHat()
    sense.clear()
    sense.rotation = 90

    try:
        print("pred zemanje konekcija")
        engine = sql.create_engine("mysql+pymysql://{username}:{passw}@localhost:3306/".format(username = "root", passw ="L.z3008994473001"))
        engine.connect()
        print("zemena konekcija")
    except:
        return {
				"error": {
					"status_code": 500,
					"message": "There was a problem connecting to the database. Check the provided credentials or if the database is available."
				}
			}


    # try:
       
    #     temp = sense.get_temperature()
    #     temp = round(temp, 1)
    #     # engine.execute('INSERT INTO `weather_data`.`weather_station_data`(`temperature`,`humidity`,`weather_station_datacol`)VALUES({},{},{});'.format(temp,humidity,pressure))
    #     print("Temperature C", temp) 


    #     humidity = sense.get_humidity()  
    #     humidity = round(humidity, 1)  
    #     print("Humidity :",humidity)  

    #     pressure = sense.get_pressure()
    #     pressure = round(pressure, 1)
    #     print("Pressure:",pressure)

    #     localtime = time.asctime( time.localtime(time.time()) )
    #     print ("Local current time :", localtime)

    #     engine.execute('INSERT INTO `weather_data`.`weather_station_data`(`temperature`,`humidity`,`weather_station_datacol`)VALUES({},{},{});'.format(temp,humidity,pressure))
    #     print("zapisana data")
    #     red = (255 , 0 , 0)
    #     green = (0 , 255 , 0)
    #     blue = (0 , 0 , 255)

    #     sense.show_message(str(temp) +" C",0.2,text_colour=red)
    #     sense.show_message(str(humidity) + "%" ,0.2,text_colour=green)
    #     sense.show_message(str(pressure) +"hPa",0.2,text_colour=blue)

    #     sense.clear()
        

    # except Exception as error_msg:
    #     sense.clear()
    #     return {'error':error_msg}


