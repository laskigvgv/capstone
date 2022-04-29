# !/usr/bin/python
import requests
from sense_hat import SenseHat
import sqlalchemy as sql
import mariadb
import time
import sys
import json
import datetime

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

        querr = """INSERT INTO `weather_data`(`temperature`,`humidity`,`pressure`)VALUES(%s,%s,%s);"""
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


def get_week_forcast():
    r = requests.get('https://api.openweathermap.org/data/2.5/onecall?lat={lat}&lon={lon}&exclude={part}&units={units}&appid={api_key}'.format(lat = "41.8", lon = "20.9",part = "current,minutely,hourly,alerts",units = "metric" , api_key = "7961c3ee193a546c55da4b309a205441"))

    dict_from_api = {}
    for i in range(1,8):

        #getting the date from the unix timestamp
        unix_timestamp = json.loads(r.content)["daily"][i]["dt"]
        date_from_unix = datetime.datetime.utcfromtimestamp(unix_timestamp).strftime("%Y-%m-%d")

        #getting the min temp
        temp_min = json.loads(r.content)["daily"][i]["temp"]["min"]


        #getting the max temp
        temp_max = json.loads(r.content)["daily"][i]["temp"]["max"]

        #getting feels like average
        feels_like_avg = (json.loads(r.content)["daily"][i]["feels_like"]["day"] + json.loads(r.content)["daily"][i]["feels_like"]["night"])/2

        #getting the pressyre 
        pressure = json.loads(r.content)["daily"][i]["pressure"]
        
        #getting the humidity
        humidity = json.loads(r.content)["daily"][i]["humidity"]
        
        dict_from_api["day_"+str(i)] = {
            "date_from_unix": date_from_unix,
            "temp_min": "{:.1f}".format(temp_min),
            "temp_max": "{:.1f}".format(temp_max),
            "feels_like_avg": "{:.1f}".format(feels_like_avg),
            "pressure": pressure,
            "humidity": humidity
        }


    with open("/Users/lazar_zdravkoski/Desktop/jsoni/7days.json","w") as write_to_file:
        json.dump(dict_from_api, write_to_file, indent=4)