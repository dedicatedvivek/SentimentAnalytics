import time
import schedule
print('THE SCRAPING WILL START IN THE SCHEDULED TIME')
import os
def job():
    exec(compile(source=open('pyfile.py').read(), filename='pyfile.py', mode='exec'))

schedule.every().day.at("17:35").do(job)

while True:
    schedule.run_pending()
    time.sleep(1)