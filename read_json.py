#!/usr/bin/python3
import json
import os
import mysql.connector
from time import sleep
while True:
    mydb = mysql.connector.connect(
      host="localhost",
      user="root",
      passwd="jameskinuthia",
      database="alexa"
    )
    mycursor = mydb.cursor()
    with open('/opt/lampp/htdocs/ruby/jendiegovernor/NTSA/search/certs.log', 'r') as f:
        if os.stat('/opt/lampp/htdocs/ruby/jendiegovernor/NTSA/search/certs.log').st_size == 0:
            print('File is empty')
            sleep(5)
        else:
            distros_dict = json.load(f)
            for distro in distros_dict:
                print(distro['id'])
                print(distro['contact'])
                print(distro['reg_no'])
                print(distro['cus_name'])
                print(distro['make'])
                print(distro['model'])
                print(distro['vin_no'])
                print(distro['chasis'])
                print(distro['dealer'])
                print(distro['action'])
                print(distro['tech'])
                print(distro['serial'])
                print(distro['date'])
                print(distro['number'])
                print(distro['defaulter'])
                try:
                        mycursor.execute("SELECT * FROM work WHERE serial="+distro['serial'])
                        myresult = mycursor.fetchall()
                        row_count = mycursor.rowcount
                        if row_count == 0:
                            sql = "INSERT INTO `work`(`reg_no`, `contact`, `cus_name`, `make`, `model`, `vin_no`, `chasis`, `action`, `tech`, `serial`, `date`,`dealer`,`number`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,%s)"
                            val = (distro['reg_no'], distro['contact'], distro['cus_name'], distro['make'],distro['model'], distro['vin_no'], distro['chasis'], distro['action'],distro['tech'],distro['serial'],distro['date'],distro['dealer'],distro['number'])
                            mycursor.execute(sql, val)
                        else:
                            sql = "UPDATE work SET reg_no = %s, contact = %s, cus_name = %s, make = %s, model = %s, vin_no = %s, chasis = %s, action = %s, tech = %s, serial = %s, date = %s, dealer = %s,number = %s,defaulter = %s WHERE serial = %s"
                            val = (distro['reg_no'],distro['contact'],distro['cus_name'],distro['make'],distro['model'],distro['vin_no'],distro['chasis'],distro['action'],distro['tech'],distro['serial'],distro['date'],distro['dealer'],distro['number'],distro['defaulter'],distro['serial']) 
                            mycursor.execute ( sql, val )
                            mydb.commit()
                            print('updated')
                except KeyError:
                    pass
                except:
                    pass
            mydb.commit()
            #os.remove("/opt/lampp/htdocs/NTSA/search/certs.log")
            file = open("/opt/lampp/htdocs/NTSA/search/certs.log","r+")
            file.truncate(0)
            file.close()
            sleep(5)
