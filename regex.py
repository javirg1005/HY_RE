import re
# Expresiones regex para extraer datos de Infojobs

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

for i in salario:
    print(i)


# Cerramos el fichero
f.close()