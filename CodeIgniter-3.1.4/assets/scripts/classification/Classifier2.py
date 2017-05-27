import MySQLdb
import math

class Classifier:
	def __init__(self, k, newData):
		db = MySQLdb.connect("localhost", "root", "", "dbpatient")
		cursor = db.cursor()

		sql = "SELECT AVG_HUMID, STD_CO, STD_CO2, STD_KETONE, KELAS, IDPATIENT FROM RECORDDATA WHERE IDPATIENT LIKE 'R%'"

		try:
			cursor.execute(sql)
			result = cursor.fetchall()

			db.close()

			self.allDataPatient = []
			self.k = k
			normNewData = []

			#print newData

			avg_humid = []
			std_co = []
			std_co2 = []
			std_ketone = []

			avg_humid.append(newData[0])
			std_co.append(newData[1])
			std_co2.append(newData[2])
			std_ketone.append(newData[3])

			for row in result:
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
				self.allDataPatient.append(dataPatient)

			normHumid = self.zScore(avg_humid)
			normCO = self.zScore(std_co)
			normCO2 = self.zScore(std_co2)
			normKetone = self.zScore(std_ketone)

			self.newData = [normHumid.pop(0), normCO.pop(0), normCO2.pop(0), normKetone.pop(0), newData[4], newData[5]]
			#print self.newData
			for record in self.allDataPatient:
				record[0] = normHumid.pop(0)
				record[1] = normCO.pop(0)
				record[2] = normCO2.pop(0)
				record[3] = normKetone.pop(0)



			self.predict()
		except:
			print "Error unable to fetch data"

	def cariMean(self, vData):
		temp = list(vData)
		temp.sort()
		lenKolom = len(temp)

		if (lenKolom % 2) == 1:
			return temp[lenKolom // 2]
		else:
			return (temp[lenKolom // 2] + temp[(lenKolom // 2) - 1]) / 2

	def zScore(self, kolom):
		mean = self.cariMean(kolom)
		asd = math.sqrt((sum([abs(x - mean) for x in kolom])) ** 2 / len(kolom))
		hasil = [(x - mean) / asd for x in kolom]

		return hasil

	def canberraDistance(self, v1, v2):
		dist = 0
		lenVektor = len(v1) - 3

		for atr in range(0, lenVektor):
			calcAtr = abs(v1[atr] - v2[atr]) / (abs(v1[atr]) + abs(v2[atr]))
			dist = dist + calcAtr

		return dist

	def calcVote(self, vHasil):
		#print vHasil
		countHealth = 0
		countDiabet = 0
		sumDHealth = 0
		sumDDiabet = 0

		for member in vHasil[0:self.k]:
			if member[1] == 1:
				countHealth = countHealth + 1
				sumDHealth = sumDHealth + member[0]
			elif member[1] == 3:
				countDiabet = countDiabet + 1
				sumDDiabet = sumDDiabet + member[0]

		#print countHealth
		#print countDiabet

		if countHealth > countDiabet:
			return 1
		elif countDiabet > countHealth:
			return 3
		elif countHealth == countDiabet:
			if sumDDiabet < sumDHealth:
				return 3
			else:
				return 1
		else:
			return 0

	def knn(self):
		hasil = []
		for record in self.allDataPatient:
			if (record[5] != self.newData[5]):
				dist = self.canberraDistance(self.newData, record)
				hasil.append((dist, record[4]))

		return self.calcVote(sorted(hasil, key=lambda x: x[0]))

	def accuracy(self, tp, fp, tn, fn):
		total = tp + tn + fp + fn
		predictHealth = fp + tp
		predictDiabetes = fn + tn
		actualDiabetes = fp + tn
		actualHealth = tp + fn

		accuracy = float((tp + tn)) / float(total)
		precissionHealth = float(tp) / float((predictHealth))
		precissionDiabet = float(tn) / float((predictDiabetes))
		recallHealth = float(tp) / float((actualHealth))
		recallDiabet = float(tn) / float((actualDiabetes))

		coeffDiabetes = float(precissionDiabet) / total
		coeffHealth = float(predictHealth) / total
		randomAccuracy = (coeffDiabetes * actualDiabetes + coeffHealth * actualHealth) / total

		kappa = ((accuracy - randomAccuracy)) / (1 - randomAccuracy)

		print "Akurasi: ", accuracy * 100.0
		print "Precission of Health: ", precissionHealth * 100.0
		print "Precission of Diabetes: ", precissionDiabet * 100.0
		print "Recall of Health: ", recallHealth * 100.0
		print "Recall of Diabet: ", recallDiabet * 100.0
		print "Kappa: %.2f" % kappa


	def predict(self):

		try:
			tp = 0
			fp = 0
			tn = 0
			fn = 0

			predictClass = self.knn()
			print predictClass

			if self.newData[4] == 1:
				if self.newData[4] == predictClass:
					tp = tp + 1
				else:
					fn = fn + 1
			elif self.newData[4] == 3:
				if self.newData[4] == predictClass:
					tn = tn + 1
				else:
					fp = fp + 1
		except:
			print "Error unable to fetch data"








