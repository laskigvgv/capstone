import sqlalchemy as sql
import requests
import urllib.request
import urllib.parse
from pprint import pprint
import json
import datetime

from config import get_connection


# root@localhost:3306
# jdbc:mysql://localhost:3306/?user=root

r = requests.get('https://api.openweathermap.org/data/2.5/onecall?lat={lat}&lon={lon}&exclude={part}&units={units}&appid={api_key}'.format(lat = "41.8", lon = "20.9",part = "current,minutely,hourly,alerts",units = "metric" , api_key = "7961c3ee193a546c55da4b309a205441"))
# print(type(r.content.decode('utf-8')))
dict_from_api = {}

cursor = get_connection()

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

querr = """INSERT INTO `week_forecast`(`one_week`)VALUES(%s);"""
data = json.dumps(dict_from_api)
# try:
cursor.execute(querr, (data,))
# except Exception as err:
#     print(err)
cursor.commit()

print(type(json.dumps(dict_from_api)))

    

# print(date_from_unix)

# try:
#     engine = sql.create_engine("mysql+pymysql://{username}:{passw}@192.168.100.0:3306/".format(username = "root", passw ="L.z3008994473001"))
#     engine.connect()
#     print("zemena konekcija")
# except:
#     print("nemoze")

