import re
import random
import datetime
import json
# Regular expression pattern to extract lat, lon
pattern = r'<trkpt lat="([\d.]+)" lon="([\d.]+)">'

# Extract and format data into JSON format
data = '''

'''
matches = re.findall(pattern, data)
i = 100
sql = ""
with open('data.txt', 'w') as f:
    for match in matches:
        lat = float(match[0])
        lon = float(match[1])
        timeNow = datetime.datetime.now()
        sql = "INSERT INTO `SensorData` (`name`, `location`, `airquality`, `reading_time`, `radius`) VALUES ('" + str(i) + "', '"+ str(lat) + ", " + str(lon) +"', '" + str(random.randrange(50,77)) +"', '" + str(timeNow) + "', '15');"
        f.write(sql)
        f.write("\n")
        i = i + 1
#print(sql)