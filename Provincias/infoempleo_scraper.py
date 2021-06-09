#Scraper para la web de empleo Monster

# Imports
import re
import requests
from bs4 import BeautifulSoup

# Conseguimos la URL
url_base = "https://www.infoempleo.com/trabajo/en_"
provincia = "Asturias/" ## Provincia a introducir por el usuario
url = url_base + provincia
print(url)

# Hacemos la petición
page = requests.get(url)
print(page.status_code)

# Imprimimos el contenido de la página
soup = BeautifulSoup(page.content, 'html.parser')
#print(soup)

# Se escribe en un archivo la salida del HTML para poder pasarlo a regex más fácilmente
file = open("empleoInfo.txt", "w+", encoding="utf-8")
file.write(str(soup))

empleos = soup.find('<ul class="mt15 positions') # No funciona porque lo de dentro de li lo considera al mismo nivel?
print("----------------------------")
print(empleos)
for i in empleos:
    print(empleos[i])
    """
    regexTitulo = '\s(.*)\n+.*<\/a>\W<\/h2>'
    resultado_titulo = re.search(regexTitulo, empleos[i])
    if resultado_titulo != None:
        print(resultado_titulo)
    """

