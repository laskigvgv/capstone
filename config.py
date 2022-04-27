#!/usr/bin/python

from sense_hat import SenseHat
import sqlalchemy as sql
import mariadb
import time
import sys

# root@localhost:3306
# jdbc:mysql://localhost:3306/?user=root


def get_weather():
    sense = SenseHat()
    sense.clear()
    sense.rotation = 90

    try:
        conn = mariadb.connect(
            user="capstone",
            password="lazar",
            host="127.0.0.1",
            port=3306,
            database="capston_project"

    )
        print("zemena konekcija")
    except mariadb.Error as e:
        print(f"Error connecting to MariaDB Platform: {e}")
        sys.exit(1)

    # Get Cursor
    cur = conn.cursor()


    try:
       
        temp = sense.get_temperature()
        temp = round(temp, 1)
        # engine.execute('INSERT INTO `weather_data`.`weather_station_data`(`temperature`,`humidity`,`weather_station_datacol`)VALUES({},{},{});'.format(temp,humidity,pressure))
        print("Temperature C", temp) 


        humidity = sense.get_humidity()  
        humidity = round(humidity, 1)  
        print("Humidity :",humidity)  

        pressure = sense.get_pressure()
        pressure = round(pressure, 1)
        print("Pressure:",pressure)

        localtime = time.asctime( time.localtime(time.time()) )
        print ("Local current time :", localtime)

        querr = """INSERT INTO `weather_data`.`weather_data`(`temperature`,`humidity`,`weather_station_datacol`)VALUES(%s,%s,%s);"""
        data = (temp, humidity, pressure)
        try:
            cur.execute(querr, data)
        except Exception as err:
            print(err)
        conn.commit()
        print("zapisana data")
        red = (255 , 0 , 0)
        green = (0 , 255 , 0)
        blue = (0 , 0 , 255)

        sense.show_message(str(temp) +" C",0.2,text_colour=red)
        sense.show_message(str(humidity) + "%" ,0.2,text_colour=green)
        sense.show_message(str(pressure) +"hPa",0.2,text_colour=blue)

        sense.clear()
        

    except Exception as error_msg:
        sense.clear()
        return {'error':error_msg}


