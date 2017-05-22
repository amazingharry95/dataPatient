import json
import sys

data = {}
namaFile = str(sys.argv[1])

namaFolder = 'C:/wamp/www/dataPatient/CodeIgniter-3.1.4/uploads/sensors/'  

with open(namaFolder+namaFile) as f:
    baris = f.readlines()
    f.close()
formatData = baris[0].split(',')
kolom = len(formatData)

data = [[] for i in range(kolom)]

for line in baris[0:]:
    fitur = line.split(',')
    for gasSensor in range(kolom):
        data[gasSensor].append(float(fitur[gasSensor]))


dataBeneran = {}
rows = []
d={'cols': [], 'rows': []}
time = 0
increment = 137/len(data[2])


for i in range(len(data[2])):
	dataWaktu = {}
	dataCO = {}
	dataRows = {}
	dataArrayCO = []
	dataWaktu['v'] = str(time)
	dataCO['v'] = data[2][i]
	dataArrayCO.append(dataWaktu)
	dataArrayCO.append(dataCO)
	dataRows['c'] = dataArrayCO
	d['rows'].append(dataRows)

	time = time + increment

d['cols'] = [ {"id":"","label":"Time","pattern":"","type":"string"},
        {"id":"","label":"RS/RO","pattern":"","type":"number"}]

print json.dumps(d)



