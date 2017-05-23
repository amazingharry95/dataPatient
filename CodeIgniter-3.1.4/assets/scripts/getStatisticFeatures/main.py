import os
import sys
import getStatisticFeatures as gsf

namaFile = str(sys.argv[1])
namaClass = str(sys.argv[2])
namaFolder = 'C:/wamp/www/dataPatient/CodeIgniter-3.1.4/uploads/sensors/'
namaFileInput = namaFolder+namaFile

fiturPasien = gsf.getFeatures(namaFileInput, namaClass)
avgCO, stdCO, stdCO2, stdKetone, avgHumid, stdVOC = fiturPasien.featuresDWT()
result = str(avgCO)+","+str(stdCO)+","+str(stdCO2)+","+str(stdKetone)+","+str(avgHumid)+","+str(stdVOC)+","+namaClass

print result
