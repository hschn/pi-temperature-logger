#!/usr/bin/python
# -*- coding: utf-8 -*-

import sqlite3 as lite
import sys

con = None

try:
    con = lite.connect('/var/www/html/phpliteadmin/templog-db')
    
    with con:

	cur = con.cursor()    
	print "now execute sql"
   	cur.execute("INSERT INTO SENSORDATA VALUES (NULL,'adasd','21','33',datetime('now'))")    
        print "after sql"
    
except lite.Error, e:
    
    print "Error %s:" % e.args[0]
    sys.exit(1)
    
finally:
    
    if con:
        con.close()
