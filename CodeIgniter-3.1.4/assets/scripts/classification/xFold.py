from random import shuffle

def bagiDataSet(namaFile, namaEmber, pemisahAntarKolom, jumlahEmber, kolomClass):
	data = {}

	with open("DataSet2/%s" % namaFile) as f:
		baris = f.readlines()
		f.close()

	for line in baris:
		if pemisahAntarKolom != '\t':
			line = line.replace(pemisahAntarKolom, '\t')
		#print line.split()
		kategori = line.split()[kolomClass-1]
		data.setdefault(kategori, [])
		data[kategori].append(line)

	ember = []

	for i in range(jumlahEmber):
		ember.append([])

	for k in data.keys():
		shuffle(data[k])
		nomorEmber = 0
		for item in data[k]:
			ember[nomorEmber].append(item)
			nomorEmber = (nomorEmber+1) % jumlahEmber

	for nomorEmber in range(jumlahEmber):
		f = open("DataSet2/%s-%02i" % (namaEmber, nomorEmber+1), 'w')
		for item in ember[nomorEmber]:
			f.write(item)
		f.close()

print("SELESAI MEMBAGI DATA\n")


