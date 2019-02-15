import pymysql
import pymysql.cursors
import tweepy
import csv
import pandas as pd
from _datetime import time
from time import sleep
class TwitterClient():
    
     def __init__(self):
         
         
         
####input your credentials here
         consumer_key = 'wlFhHiZJSTVb3k1rcjTqx65Ch' 
         consumer_secret = 'Bdo5g3DRequWoK8HgaQMf9EXYDEEOPDScsisDXPnoZiWIdKb1g'
         access_token = '1082646302301790208-SpvxhYpwjVsYAFaQZwVSNlNMPFWuQB'
         access_token_secret = 'auTrniTix2biWt31zFPjz82P6GWadyA77WcJEg9NVAR62'
        #csvFile = open('apple.csv', 'w')
        #Use csv Writer
        #csvWriter = csv.writer(csvFile)
         try:
             auth = tweepy.OAuthHandler(consumer_key, consumer_secret)
             auth.set_access_token(access_token, access_token_secret)
             api = tweepy.API(auth)
            
         except:
             print("Error: Authentication Failed")
        #####United Airlines
        # Open/Create a file to append data
        #csvFile = open('apple.csv', 'w')
        #Use csv Writer
        #csvWriter = csv.writer(csvFile)
     def database_connectivity(self):
         
         connection = pymysql.connect(
         host='localhost',
         user='root',
         password='',                             
         db='analyticsproj',
         port=3306
         )
            
         cursor=connection.cursor()
         cursor2=connection.cursor()
         sql="select `keyword_name`,`language` from `keywords_master`" 
         
         cursor.execute(sql)
         
         sql2="select count(`keyword_name`) from `keywords_master`"
         cursor2.execute(sql2)
         
        
         
         for x in cursor2:
             
             print (x)
             
         records_count= x[0]
         
         arr = []
         
         for i in range(0,records_count):
             for j in cursor:
                 arr.append(j)
             return arr
             
         
         
         
            
        
    
   
        


     def get_tweets(self):
         ab = TwitterClient()
         bc= ab.database_connectivity()  
         
         print (bc)
         count_elements = len(bc)
         
         for i in range (0,count_elements):
             
         
              elem = bc[i]
              
              keyword = elem[0]
              lang = elem[1]
              
                  

              filename=keyword+"_"+lang+"tweets.csv"
              csvFile = open(filename, 'a')
              #Use csv Writer
              csvWriter = csv.writer(csvFile)
              j=0
              for tweet in tweepy.Cursor(api.search,q=keyword,count=200,
                                            lang="en").items():
                   
                   if(j>=5):
                       
                       print('limit reached sleeping now')
#                       sleep(15*60)
                       
                       j=0   
                       break;
                   print (tweet.created_at, tweet.text)
                   csvWriter.writerow([tweet.text.encode('utf-8')])
                   j=j+1
                   print (j)
                   
obj = TwitterClient()
obj.get_tweets()
  


   
      