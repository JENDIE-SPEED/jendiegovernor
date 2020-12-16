#!/usr/bin/python3
import tailer
import ast
from jsonclasses import main
import mysql.connector
mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="jameskinuthia",
  database="alexa"
)
mycursor = mydb.cursor()
for line in tailer.follow(open('messages2.log')):
    try:
        line = main(line)
        try:
            print(type(line))        
            for vehicle in line:
                vehicle["terIP"]
                vehicle["date"]
                vehicle["time"]
                vehicle["verdor"]
                vehicle["cph"]
                vehicle["velocity"]
                vehicle["longitude"]
                vehicle["latitude"]
                vehicle["poweralarm"]
                vehicle["speedDisConn"]
                try:
                    sql = "INSERT INTO `data`( `vehicle`, `date`, `time`, `longitude`, `latitude`, `velocity`, `poweralarm`, `speedDisConn`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)"
                    val = (vehicle["terIP"], vehicle["date"], vehicle["time"], vehicle["longitude"], vehicle["latitude"], vehicle["velocity"],vehicle["poweralarm"], vehicle["speedDisConn"])
                    mycursor.execute(sql, val)
                except KeyError:
                    print(error)
                    pass
                except:
                    pass
            mydb.commit()
        except:
            pass
    except:
        pass
