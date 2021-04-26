import re
# Expresiones regex para extraer datos

# 1. Infojobs

# Leemos el fichero json con los resultados del GET Offer
f = open("resultado_infojobs_primero.txt", "r", encoding="utf-8")
data = f.readline()
lineas = f.readlines()
print(data)
print("----------------------------------------")
print(lineas)

"""
# Aplicamos la regex
regexTitle = 'title":\s"([\w]*[\s]*\.*)*'
title = re.search('title":\s"([\w]*[\s]*\.*)*', data).group[0]
print("-------------------------------------------------")"""
print(title)

for i in

# Ejemplo de regex
# regex =  = 'Address:\s(\w{2}:\w{2}:\w{2}:\w{2}:\w{2}:\w{2})\\n'
# resultadoRegex = re.search(regexAddress, str_cell).group(1)


# Cerramos el fichero
f.close()