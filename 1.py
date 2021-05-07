import serial
# import time
# from time import sleep
# from datetime import datetime
# from mysql.connector import connect

ser = serial.Serial("/dev/ttyUSB0",9600)
ser.timeout = 1

# try:
ser.write(b'\x01\x03\x00\x00\x00\x03\x05\xcb')
# sleep(0.01)

stan_byte = ser.read(11)
# print(stan_byte)
# sleep(1)
stan_int = (stan_byte[4]*256**2 + stan_byte[6]*256 + stan_byte[8])/100
# stan_int = 1
print(str(stan_int))

# sleep(1)
        
# except KeyboardInterrupt:
#     pass

# print("czesc")