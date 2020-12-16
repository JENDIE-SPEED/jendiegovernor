import tailer
import ast
from jsonclasses import main

# import mysql.connector
# mydb = mysql.connector.connect(
#   host="localhost",
#   user="root",
#   passwd="",
#   database="alexa"
# )
# mycursor = mydb.cursor()
for line in tailer.follow(open('/opt/lampp/htdocs/NTSA/search/certs.log')):
    print(line)
