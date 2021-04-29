# Expresiones regex para extraer datos de Infojobs
import re

# Leemos el fichero con los resultados del GET Offer
f = open("resultado_infojobs_primero.txt", "r", encoding="utf-8")
data = f.read()
lineas = f.readlines()

# Aplicamos la regex

#regexTitle = 'title":\s"([\w\s\.]*)'
#regexProvincia = 'province":\s{\s*"id":\s\d+,\s+"value":\s"(\w+\s*)"'
#regexURL = '(https:\/\/www.infojobs.net\/[\w+\s*]*\/[\w+\s*\-*\.*]*\/[\w+\s*\-*]*)'
#regexSalario = 'salaryMin":\s{\s*"id":\s\w*,\s*"value":\s"(\d*\.\d*)'

titulo = re.findall(r'title":\s"([\w\s\.]*)', data)
provincia = re.findall(r'province":\s{\s*"id":\s\d+,\s+"value":\s"(\w+\s*)"', data)
url = re.findall(r'(https:\/\/www.infojobs.net\/[\w+\s*]*\/[\w+\s*\-*\.*]*\/[\w+\s*\-*]*)', data)
salario = re.findall(r'salaryMin":\s{\s*"id":\s\w*,\s*"value":\s"(\d*\.\d*)*', data)

aux=[]
for i in range(len(salario)):
    if (len(salario[i]) > 1):
        aux.append(salario[i])
        print(aux[i])
    else:
        aus = salario[i].replace("", "TBD")
        aux.append(aus)
        print(aux[i])

#oferta = {'titulo': titulo, 'provincia': provincia, 'url': url, 'salario:'salario }

# Cerramos el fichero
f.close()