import heapq as h
import random as r
from math import sqrt

class Classifier:
	def __init__(self, namaFileEmber, nomorEmberTest, formatData, jumlahEmber, k):
		self.k = k
		self.format = formatData.split(' ')
		self.data = []

		for i in range(1, jumlahEmber):
			if i != nomorEmberTest:
				namaFile = "%s-%02i" % (namaFileEmber, i)
				with open("DataSet2/%s" % namaFile) as f:
					baris = f.readlines()
					print(baris)
					f.close()
				for line in baris:
					atribut = line.split('\t')
					vector = []
					for i in range(len(atribut)):
						if self.format[i] == "atribut":
							vector.append(float(atribut[i]))
						elif self.format[i] == "kelas":
							classification = atribut[i]
					self.data.append((classification, vector))

	def DataTest(self, namaFileEmber, nomorEmberTest):
		namaFile = "%s-%02i" % (namaFileEmber, nomorEmberTest) 
		with open("DataSet2/%s" % namaFile) as f:
			baris = f.readlines()
			f.close()
		totals = {}
		for line in baris:
			data = line.split('\t')
			vector = []
			classInColumn = -1
			for i in range(len(self.format)):
				if self.format[i] == "atribut":
					vector.append(float(data[i]))
				elif self.format[i] == "kelas":
					classInColumn = i
			
			theRealClass = data[classInColumn]
			classifiedAs = self.classify(vector) #classfier menklasifikasikan ke kategori mana
			print(classifiedAs)
			totals.setdefault(theRealClass, {})
			totals[theRealClass].setdefault(classifiedAs, 0)
			totals[theRealClass][classifiedAs] +=1
		return totals

	def EucledianDistance(self, vector1, vector2):
		return sqrt(sum(map(lambda v1, v2: (v1-v2)**2, vector1, vector2)))

	def kNN(self, objekVector):
		neighbours = h.nsmallest(self.k, [(self.EucledianDistance(objekVector, item[1]), item) 
					for item in self.data])
		result = {}

		for neighbour in neighbours:
			theClass = neighbour[1][0] #classnya neighbour apa
			result.setdefault(theClass, 0)
			result[theClass] +=1
		resultList = sorted([(i[1],i[0]) for i in result.items()], reverse= True)
		maxVotes = resultList[0][0]
		kategoriYangMungkin = [i[1] for i in resultList if i[0] == maxVotes]

		kategori = r.choice(kategoriYangMungkin)

		return kategori

	def classify(self, objekVector):
		return(self.kNN(objekVector))
