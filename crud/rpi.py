import RPi.GPIO as gpio
import time

valid_pins = [2,3,4,5,6,13,19,26,21,20,16,12,25,18,23,18]
gpio.setmode(GPIO.BCM)
gpio.setwarnings(False)

def change_pin_status(a,b):
	if b==1:
		gpio.output(a,gpio.HIGH)
	else:
		gpio.output(a,gpio.LOW)

print("the list of valid inputs are:")
print(valid_pins)
wish='y'
while(wish=='y' or wish=='Y'):
	pin = input("enter  gpio number")
	state = input("enter the state 1 for high 0 for low")

	if pin not in valid-pins:
		print("enter valid pin")
	else:
		gpio.setup(pin,gpio.OUT)
		change_pin_status(pin,state)
		print("press y to continue n to stop")
		print("NOTE: once you press n all your gpio's will be cleared")
		wish=input()
gpio.cleanup()
	 
