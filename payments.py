#!/usr/bin/python3
import ast
import json
import mysql.connector
import datetime
import time
from mysql.connector import MySQLConnection, Error

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="JAMESKINUTHIA",
  database="alexa"
)
mycursor = mydb.cursor()
sql = "insert into payments(TransactionType, TransID, TransTime, TransAmount, BusinessShortCode, BillRefNumber, InvoiceNumber, \
        OrgAccountBalance, ThirdPartyTransID, MSISDN, FirstName, MiddleName, LastName) values(%s, %s, %s, %s, %s, %s, %s, %s, \
        %s, %s, %s, %s, %s)"

while True:
    with open("messages.log", "r") as f:
        data = f.read()
    data = "[" + data + "]"
    data = data.replace('\n', '')

    data = data.replace('}', '},')

    data = ast.literal_eval(data)

    with open("output.json", "w") as file:
        json.dump(data, file, indent=4)

    for i in data:
        try:
            val = i['TransactionType'], i['TransID'], i['TransTime'], i['TransAmount'], i['BusinessShortCode'], i['BillRefNumber'], i['InvoiceNumber'], i['OrgAccountBalance'], i['ThirdPartyTransID'], i['MSISDN'], i['FirstName'], i['MiddleName'], i['LastName']
            mycursor.execute(sql, val)
            mydb.commit()
            print(mycursor.rowcount, "record inserted.")
        except KeyError:
            pass
        except Error as e:
            print(e)

    mydb.commit()
    print(datetime.datetime.now())

    print("done")
    time.sleep(55)
    #ALTER TABLE `payments` ADD `InvoiceNumber` VARCHAR(255) NOT NULL AFTER `BillRefNumber`;
    #ALTER TABLE `payments` ADD `ThirdPartyTransID` VARCHAR(255) NOT NULL AFTER `OrgAccountBalance`;
