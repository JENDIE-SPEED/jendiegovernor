#!/usr/bin/python3
import tailer, ast, mysql.connector
mydb = mysql.connector.connect(host="localhost", user="root", passwd="jameskinuthia", database="alexa")
sql = "INSERT INTO data( vehicle, date, time, longitude, latitude, velocity, poweralarm, speedDisConn) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)"
err, mycursor = mysql.connector.errors.IntegrityError, mydb.cursor()
for line in tailer.follow(open('messages2.log')):
    line = ast.literal_eval(line)
    for data in line:
        sql = "INSERT INTO data( vehicle, date, time, longitude, latitude, velocity, poweralarm, speedDisConn) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)"
        val = (data["terIP"], data["date"], data["time"], data["longitude"],  data["latitude"], data["velocity"], data["poweralarm"], data["speedDisConn"])
        mycursor.execute(sql, val)
        mydb.commit()
        print(f"data:--->>    {list(val)}      status:{mycursor.rowcount}      <<---- that record inserted.")
