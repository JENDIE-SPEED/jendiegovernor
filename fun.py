import socket 
import threading
import select

HEADER = 3072
PORT = 4040
IP = '0.0.0.0'
ADDRESS = (IP, PORT)
FORMAT = 'ascii'

try:
    server = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    server.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
    server.bind(ADDRESS)
except OSError:
    print("Port already in use")

def process_client(conn, addr):
    try:
        conn.setblocking(0)
        print(f"[NEW CONNECTION] {addr} connected.")
        ready = select.select([conn], [], [], 2)
        if ready[0]:
            data = conn.recv(1024).decode(FORMAT)
            print(f"[{addr}] {data}")
            # date = data.split(",", 1)
            # time =data.split(",", 2)
            # imei =data.split(",", 3)
            # vendor= data.split(",",4)
            # reg =data.split(",",5)
            # odometor=data.split(",",6)
            # latitude=data.split(",",7)
            # latitude_direction=data.split(",",8)
            # longitude=data.split(",",9)
            # longitude_direction=data.split(",",10)
            # power_status=data.split(",",11)
            # speed_signal_status=data.split(",",12)
            # heading=data.split(",",13)
            # gps_status=data.split(",",14)
            # ignition_status=data.split(",",15)
            # overspeed_status=data.split(",",16)



            # print(overspeed_status) 
        if not ready[0]:
            print(f"No DATA RECEIVED")
        conn.close()
    except OSError:
        print("connection closed by client")
        

def start():
    try:
        server.listen()
        print(f"[LISTENING] Server is listening on {IP}")
        while True:
            conn, addr = server.accept()

            if conn:
                thread = threading.Thread(target=process_client, args=(conn, addr))
                thread.start()
            print(f"[ACTIVE THREADS] {threading.activeCount() - 1}")
    except OSError:
        print("error")


print("[STARTING] server is starting...")
start()
