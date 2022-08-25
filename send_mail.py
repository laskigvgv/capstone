import smtplib, ssl
import json
import sys

f_name , email_addr, email_body= sys.argv[1], sys.argv[2], sys.argv[3]

def send_mail(f_name , email_addr, email_body):
	smtp_server = "smtp.gmail.com"
	port = 587
	sender_email = "zdr.lazar.salesrocks@gmail.com"
	passw = "audrdgvpsbkyrqjl"

	email_to = "zdravkoski.lazar@gmail.com"

	context = ssl.create_default_context()

	try:
	    server = smtplib.SMTP(smtp_server,port)
	    server.ehlo()
	    server.starttls(context=context)
	    server.ehlo()
	    server.login(sender_email, passw)
	    # TODO: Send email here

	    email_message = """
	    Subject: Contact Form
	    
	    Email Message From {email_addr}

	    {email_body}""".format(email_addr = email_addr, email_body = email_body)

	    server.sendmail(sender_email, email_to, email_message)

	except Exception as e:
	    # Print any error messages to stdout
	    print(e)
	finally:
	    server.quit() 

	print("ISPRATEN EMAIL ||| KRAJ NA SEND_MAIL 	", email_body)


send_mail(f_name , email_addr, email_body)