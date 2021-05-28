# Web scraper para fotocasa

# Imports
import re
import requests
from bs4 import BeautifulSoup

# Conseguimos la URL
url_base = "https://www.fotocasa.es/es/comprar/viviendas/"
localidad = "oviedo" ## Localidad a introducir por el usuario
url = url_base + localidad +"/todas-las-zonas/l?"
#print(url)

# Hacemos la petición
page = requests.get(url)
#print(page.status_code)

# Imprimimos el contenido de la página
#print(page.content)
soup = BeautifulSoup(page.content, 'html.parser')
#print(soup)

# Se escribe en un archivo la salida del HTML para poder pasarlo a regex más fácilmente
file = open("html_general.txt", "w+")
file.write(str(soup))

# Por regex se saca la URL de cada piso
regex = 'primary"><a href="(\/es\/.*?\/.*?\/.*?\/.*?\/.*?\/.")'
resultado_regex = re.search(regex, str(soup))
print(resultado_regex[1])
 
## TODO: meter todos los resultados de la regex en un array
array_regex = []

#https://stackoverflow.com/questions/26438345/how-to-print-regex-match-results-in-python-3
"""

## ------------------------------------ Meter en un bucle for ------------------------------------ ##

# Prueba con una URL
url_fotocasa = "https://www.fotocasa.es"
url_teatinos = "/es/comprar/vivienda/oviedo/calefaccion-parking-terraza-trastero-ascensor/158992570/d"
url_piso = url_fotocasa + url_teatinos
print(url_piso)

# Una vez tenemos la URL de la vivienda en concreto, la scrapeamos
vivienda = requests.get(url_piso)
print(vivienda.status_code)

# Imprimimos el contenido de la página
print(vivienda.content)
soup_casa = BeautifulSoup(vivienda.content, 'html.parser')
print(soup_casa)

# Se escribe en un archivo la salida del HTML de la vivienda para poder pasarlo a regex más fácilmente
file = open("html_vivienda.txt", "w+")
file.write(str(soup_casa))

"""