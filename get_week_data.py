from config import get_week_forcast


try:
    get_week_forcast()
except Exception as error_message:
    print(error_message)


        