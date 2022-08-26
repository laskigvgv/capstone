import smtplib, ssl
import json
import sys

from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

f_name , email_addr, email_body = sys.argv[1], sys.argv[2], sys.argv[3]
print(email_body)
def send_mail(f_name , email_addr, email_body):
	sender_email = "zdr.lazar.salesrocks@gmail.com"
	receiver_email = "zdravkoski.lazar@gmail.com"
	password = "audrdgvpsbkyrqjl"

	message = MIMEMultipart("alternative")
	message["Subject"] = "Contact Form Email From {}".format(email_addr)
	message["From"] = sender_email
	message["To"] = receiver_email

	text = """{}""".format(email_body)

	part1 = MIMEText(text, "plain")

	message.attach(part1)

	context = ssl.create_default_context()
	with smtplib.SMTP_SSL("smtp.gmail.com", 465, context=context) as server:
	    server.login(sender_email, password)
	    server.sendmail(
	    sender_email, receiver_email, message.as_string()
	    )
	

send_mail(f_name , email_addr, email_body)