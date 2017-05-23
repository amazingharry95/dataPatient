import Classifier
import xFold
from sys import stdout, stdin

def Kappa_Statistic(confusionMatrix, total, correct):
		cIs = (confusionMatrix[0] + confusionMatrix[3] + confusionMatrix[6])/total
		cIve = (confusionMatrix[1] + confusionMatrix[4] + confusionMatrix[7])/total
		cIvi = (confusionMatrix[2] + confusionMatrix[5] + confusionMatrix[8])/total
		rIs = confusionMatrix[0] + confusionMatrix[1] + confusionMatrix[2]
		rIve = confusionMatrix[3] + confusionMatrix[4] + confusionMatrix[5]
		rIvi = confusionMatrix[6] + confusionMatrix[7] + confusionMatrix[8]

		Pr = (cIs*rIs + cIve*rIve + cIvi*rIvi)/total
		Pc = correct/total
		k = (Pc - Pr)/(1 - Pr)

		hasil = ""
		if 0.01<=k<=0.20:
			hasil = "slightly good"
		elif 0.21<=k<=0.40:
			hasil = "fair performance"
		elif 0.41<=k<=0.60:
			hasil = "moderate performance"
		elif 0.61<=k<=0.80:
			hasil = "substantially good performance"
		elif 0.81<=k<=1:
			hasil = "near perfect performance"
		result = (k,hasil)

		return result

def main(namaFileEmber, formatData, jumlahEmber, k):
	results = {}

	for i in range(1, jumlahEmber+1):
		c = Classifier.Classifier(namaFileEmber, i, formatData, jumlahEmber+1, k)
		t = c.DataTest(namaFileEmber, i)
 
		for (key, values) in t.items():
			results.setdefault(key, {})
			for (ckey, cvalue) in values.items():
				results[key].setdefault(ckey, 0)
				results[key][ckey] += cvalue

	kategori = list(results.keys())
	kategori.sort()

	print("CONFUSION MATRIX")
	subHeader = "+--------------"*3
	stdout.write("      RA")
	stdout.write("             RC")
	stdout.write("             RH\n")
	print(subHeader)

	totalData = 0.0
	correct = 0.0
	hasil = []

	for kelas in kategori:
		row = "|" 
		for k in kategori:
			if k in results[kelas]:
				count = results[kelas][k]
				hasil.append(count)
			else:
				count = 0
				hasil.append(count)
			row += "%3i           |" % count
			totalData += count

			if k == kelas:
				correct += count
		print(row, kelas)

	k, performance = Kappa_Statistic(hasil, totalData, correct)
	print(subHeader)
	print("\nTotal Data: %d\nAkurasi: %.3f%%" % (totalData, (correct*100)/totalData))
	print("Kappa: %.3f | %s" % (k, performance))

jumlahEmber = 10
k = 8
xFold.bagiDataSet("ppm_12Level_40_db6_v2.csv", "diabetes", ' ', jumlahEmber, 25)
main("diabetes", "atribut atribut atribut atribut atribut atribut atribut atribut atribut atribut atribut atribut atribut atribut atribut atribut atribut atribut atribut atribut atribut atribut atribut atribut kelas", jumlahEmber, k)


