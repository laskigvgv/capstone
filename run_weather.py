from config import get_weather
from sense_hat import SenseHat

sense = SenseHat()
try:
    get_weather()
except KeyboardInterrupt:
    sense.clear()
    pass