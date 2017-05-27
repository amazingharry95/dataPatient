import MySQLdb
import math
import sys


#newData = sys.agrv[1]
newData = [1,2,3,4]
#print newData

def cariMean(alist):
	temp = list(alist)
	temp.sort()
	lenKolom = len(temp)

	if(lenKolom % 2) == 1:
		return temp[lenKolom // 2]
	else:
		return (temp[lenKolom // 2] + temp[(lenKolom // 2) - 1]) / 2

def zScore(kolom):
	mean = cariMean(kolom)
	asd = math.sqrt((sum([abs(x - mean) for x in kolom]))**2 / len(kolom))
	hasil = [(x - mean) / asd for x in kolom]

	return hasil

def canberraDistance(v1,v2):
	dist = 0
	lenVektor = len(v1)-3

	for atr in range(0,lenVektor):
		calcAtr = abs(v1[atr]-v2[atr])/(abs(v1[atr]) + abs(v2[atr]))
		dist = dist + calcAtr
	#print dist

	return dist

def calcVote(k, vHasil):
	#print "v Hasil: ", vHasil
	countHealth = 0
	countDiabet = 0
	sumDHealth = 0
	sumDDiabet = 0

	for member in vHasil[0:k]:
		if member[1] == 1:
			countHealth = countHealth + 1
			sumDHealth = sumDHealth + member[0]
		elif member[1] == 3:
			countDiabet = countDiabet + 1
			sumDDiabet = sumDDiabet + member[0]
	#print "vote H: ", countHealth
	#print "vote D: ", countDiabet

	if countHealth > countDiabet:
		return 1
	elif countDiabet > countHealth:
		return 3
	elif countHealth == countDiabet:
		if sumDDiabet < sumDHealth:
			return  3
		else:
			return 1
	else:
		return 0




def knn(k, row, dataSet):
	#print "row: ", row
	hasil = []
	for record in dataSet:
		if(record[5] != row[5]):
			#print "pasangan: ", record
			dist = canberraDistance(row, record)
			hasil.append((dist, record[4]))
	return calcVote(k, sorted(hasil, key=lambda x:x[0]))
			#print dist

def predict(k, dataSet, vData):
	tp = 0
	fp = 0
	tn = 0
	fn = 0

	for row in dataSet:
		predictClass = knn(k, row, dataSet)

		if row[4] == 1:
			if row[4] == predictClass:
				tp = tp + 1
			else:
				fn = fn+ 1
		elif row[4] == 3:
			if row[4] == predictClass:
				tn = tn + 1
			else:
				fp = fp + 1

		#print row, predictClass
	"""print tp
	print fp
	print tn
	print fn"""

	total = tp + tn + fp + fn
	predictHealth = fp + tp
	predictDiabetes = fn + tn
	actualDiabetes = fp + tn
	actualHealth = tp + fn

	accuracy = float((tp+tn))/float(total)
	precissionHealth = float(tp)/float((predictHealth))
	precissionDiabet = float(tn)/float((predictDiabetes))
	recallHealth = float(tp)/float((actualHealth))
	recallDiabet = float(tn)/float((actualDiabetes))

	coeffDiabetes = float(precissionDiabet)/total
	coeffHealth =float(predictHealth)/total
	randomAccuracy = (coeffDiabetes*actualDiabetes + coeffHealth*actualHealth)/total

	kappa = ((accuracy-randomAccuracy))/(1-randomAccuracy)

	print "%.2f,%.2f,%.2f,%.2f,%.2f,%.2f" % (accuracy*100.0,precissionHealth*100.0,precissionDiabet*100.0 \
												  ,recallHealth*100.0,recallDiabet*100.0,kappa)
	"""print "Akurasi: ", accuracy*100.0
	print "Precission of Health: ", precissionHealth*100.0
	print "Precission of Diabetes: ", precissionDiabet*100.0
	print "Recall of Health: ", recallHealth*100.0
	print "Recall of Diabet: ", recallDiabet*100.0
	print "Kappa: %.2f" % kappa"""





db = MySQLdb.connect("localhost", "root", "", "dbpatient")

cursor = db.cursor()

sql = "SELECT AVG_HUMID, STD_CO, STD_CO2, STD_KETONE, KELAS, IDPATIENT FROM RECORDDATA WHERE IDPATIENT LIKE 'R%'"
"""sqlAvgHumid = "SELECT AVG_HUMID FROM RECORDDATA"
sqlStdCO = "SELECT STD_CO FROM RECORDDATA"
sqlStdCO2 = "SELECT STD_CO2 FROM RECORDDATA"
sqlStdKetone = """


try:
	cursor.execute(sql)
	result = cursor.fetchall()


	#print results
	allDataPatient = []
	dataSet = []
	avg_humid = []
	std_co = []
	std_co2 = []
	std_ketone = []

	#print results[1]

	for row in result:
		#print row
		dataPatient = []
		dataPatient.append(row[0])
		avg_humid.append(row[0])
		dataPatient.append(row[1])
		std_co.append(row[1])
		dataPatient.append(row[2])
		std_co2.append(row[2])
		dataPatient.append(row[3])
		std_ketone.append(row[3])
		dataPatient.append(int(row[4]))
		dataPatient.append(row[5])
		allDataPatient.append(dataPatient)
	#print "atas: ", allDataPatient
	normHumid =  zScore(avg_humid)
	normCO = zScore(std_co)
	normCO2 =  zScore(std_co2)
	normKetone = zScore(std_ketone)
	"""print "humid: ", normHumid
	print "co: ", normCO
	print "co2: ", normCO2
	print "ketone: ", normKetone"""

	for record in allDataPatient:
			record[0] = normHumid.pop(0)
			record[1] = normCO.pop(0)
			record[2] = normCO2.pop(0)
			record[3] = normKetone.pop(0)

	#print "bawah: ", allDataPatient
	#print "isi: ", len(allDataPatient)

	predict(8, allDataPatient, newData)
except:
	print "Error unable to fetch data"

db.close()
