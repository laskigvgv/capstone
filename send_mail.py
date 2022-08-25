import smtplib, ssl
import json
import sys

from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

f_name , email_addr, email_body = sys.argv[1], sys.argv[2], sys.argv[3]
print(email_body)
def send_mail(f_name , email_addr, email_body):
	print("EMAIL BODY NA POCETOK NA FUNKCIJA	", email_body)
	smtp_server = "smtp.gmail.com"
	port = 587
	sender_email = "zdr.lazar.salesrocks@gmail.com"
	passw = "audrdgvpsbkyrqjl"
	email_to = "zdravkoski.lazar@gmail.com"

	context = ssl.create_default_context()
	message = MIMEMultipart("alternative")
	message["Subject"] = "Contact Form from {}".format(email_addr)
	message["From"] = sender_email
	message["To"] = email_to

	try:
	    server = smtplib.SMTP(smtp_server,port)
	    server.ehlo()
	    server.starttls(context=context)
	    server.ehlo()
	    server.login(sender_email, passw)
	    # TODO: Send email here

	    text = """Email from {}

	    {}""".format(email_addr, email_body)

	    part1 = MIMEText(text, "plain")

	    message.attach(part1)
	    server.sendmail(sender_email, email_to, message)

	except Exception as e:
	    # Print any error messages to stdout
	    print(e)
	finally:
	    server.quit() 

	# print("ISPRATEN EMAIL ||| KRAJ NA SEND_MAIL 	", email_body)


send_mail(f_name , email_addr, email_body)