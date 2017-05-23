from pywt import dwt, wavedec

class preProcessing:
    def __init__(self, co, co2, ketone, h, t, voc):
        self.karbonMonok = co
        self.karbonDiok = co2
        self.ketone = ketone
        self.humid = h
        self.temp = t
        self.voc = voc

    def dwtDB6(self):
		cA_CO, cD_CO = wavedec(self.karbonMonok,'db6', level=1)
		cA_CO2, cD_CO2 = wavedec(self.karbonDiok, 'db6', level=1)
		cA_Ketone, cD_Ketone = wavedec(self.ketone, 'db6', level=1)
		cA_Humid, cD_Humid = wavedec(self.humid, 'db6', level=1)
		cA_VOC, cD_VOC = wavedec(self.voc, 'db6', level=1)

		return cA_CO, cA_CO2, cA_Ketone, cA_Humid, cA_VOC
