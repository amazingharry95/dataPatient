import numpy as np
import preProcessing as dwt


class getFeatures:
	def __init__(self, namaFile, namaClass):
		self.data = {}
		self.dataClass = namaClass #ambil class dari nama file

		with open(namaFile) as f:
			baris = f.readlines()
			f.close()
		formatData = baris[0].split(',')

		self.kolom = len(formatData)

		self.data = [[] for i in range(self.kolom)]

		for line in baris[0:]:
			fitur = line.split(',')
			for kolom in range(self.kolom):
				self.data[kolom].append(float(fitur[kolom]))
		#print len(self.data[0])

	@staticmethod
	def avg(gasArray):
		return np.average(gasArray)
	@staticmethod
	def std(gasArray):
		return np.std(gasArray)

	def featuresDWT(self):
		dwtFunc = dwt.preProcessing(self.data[0], self.data[1], self.data[2], self.data[3], self.data[4], self.data[5])
		cA_CO, cA_CO2, cA_Ketone, cA_Humid, cA_VOC = dwtFunc.dwtDB6()

		return self.avg(cA_CO), self.std(cA_CO), self.std(cA_CO2), self.std(cA_Ketone), self.avg(cA_Humid), self.std(cA_VOC)





		


