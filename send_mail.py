import smtplib, ssl
import json
import sys

f_name, email_addr, email_body = sys.argw[1], sys.argw[2], sys.argw[3]

def send_mail():
	f_name, email_addr, email_body = f_name, email_addr, email_body
	print("da")

print(send_mail)