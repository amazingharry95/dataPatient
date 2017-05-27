import Classifier2 as cf
import sys


data = str(sys.argv[1])
sensorData = data.split(',')

#newData = [49.9965, 0.142815, 0.382556, 1.19488, 1, 'RH001.txt']


newData = [float(sensorData[0]), float(sensorData[1]), float(sensorData[2]), float(sensorData[3]), \
		   int(sensorData[4]), str(sensorData[5])]

#print newData

coba = cf.Classifier(8, newData)
