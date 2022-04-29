import sqlalchemy as sql

# root@localhost:3306
# jdbc:mysql://localhost:3306/?user=root
try:
    engine = sql.create_engine("mysql+pymysql://{username}:{passw}@192.168.100.0:3306/".format(username = "root", passw ="L.z3008994473001"))
    engine.connect()
    print("zemena konekcija")
except:
    print("nemoze")

