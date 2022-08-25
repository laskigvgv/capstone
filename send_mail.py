import smtplib, ssl
import json
import sys

f_name , email_addr, email_body= sys.argv[1], sys.argv[2], sys.argv[3]

def send_mail(f_name , email_addr, email_body):
	print(f_name, "	", email_addr,"	", email_body)

send_mail(f_name , email_addr, email_body)