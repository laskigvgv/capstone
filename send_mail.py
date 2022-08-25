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

	message = MIMEMultipart("alternative")
	message["Subject"] = "multipart test"
	message["From"] = sender_email
	message["To"] = email_to

	# Create the plain-text and HTML version of your message
	text = """\
	 Email From {} 

	 {}""".format(email_addr, email_body)
	

	# Turn these into plain/html MIMEText objects
	part1 = MIMEText(text, "plain")

	# Add HTML/plain-text parts to MIMEMultipart message
	# The email client will try to render the last part first
	message.attach(part1)

	# Create secure connection with server and send email
	context = ssl.create_default_context()
	with smtplib.SMTP_SSL("smtp.gmail.com", 465, context=context) as server:
	    server.login(sender_email, passw)
	    server.sendmail(
	        sender_email, receiver_email, message.as_string()
	    )

	except Exception as e:
	    # Print any error messages to stdout
	    print(e)
	finally:
	    server.quit() 

	# print("ISPRATEN EMAIL ||| KRAJ NA SEND_MAIL 	", email_body)


send_mail(f_name , email_addr, email_body)