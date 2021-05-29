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
soup = BeautifulSoup(page.content, 'html.parser')
#print(soup)

"""
# Se escribe en un archivo la salida del HTML para poder pasarlo a regex más fácilmente
file = open("html_general.txt", "w+", encoding="utf-8")
file.write(str(soup))
"""

articulos = soup.findAll("article")
urls = []

# Aplicamos regex
for articulo in articulos:
    regex = 'primary"><a href="(\/es\/.*?\/.*?\/.*?\/.*?\/.*?\/.)"'
    resultado_regex = re.search(regex, str(articulo))
    if resultado_regex != None:
        urls.append(resultado_regex.group(1))

# Conseguir urls de los pisos
url_fotocasa = "https://www.fotocasa.es"
viviendas = []

for i in range (len(urls)):
    url_piso = url_fotocasa + urls[i]
    print(url_piso)
    viviendas.append(url_piso)

# Una vez tenemos la URL de la vivienda en concreto, la scrapeamos
for i in range(0, len(viviendas)):
    vivienda = requests.get(viviendas[i])
    #print(vivienda.status_code)

    # Imprimimos el contenido de la página
    soup_casa = BeautifulSoup(vivienda.content, 'html.parser')
    #print(soup_casa)

    """
    # Se escribe en un archivo la salida del HTML de la vivienda para poder pasarlo a regex más fácilmente
    file = open("html_vivienda.txt", "w+", encoding="utf-8")
    file.write(str(soup_casa))
    """
    

    ## ------------ Información por cada vivienda --------------- ##

    # Título
    regexTitulo = '<h1 class="re-DetailHeader-propertyTitle">(.*)<\/h1>'
    titulo = re.search(regexTitulo, str(soup_casa))
    print(titulo.group(1))

    # Descripción

    # Número Metros Cuadrados
    regexMetros = '<span>(\d{1,7})<\/span> m²'
    metros = re.search(regexMetros, str(soup_casa))
    print(metros.group(1), end= " m²\n")

    # Precio
    regexPrecio = '<span class="re-DetailHeader-price">(.*) €<\/span>'
    precio = re.search(regexPrecio, str(soup_casa))
    print(precio.group(1), end="€\n")

    # Número Habitaciones
    regexHabs = '<span>(.)<\/span> habs'
    habs = re.search(regexHabs, str(soup_casa))
    print(habs.group(1),end=" habitaciones\n")

    # Número Baños
    regexBaños = '<span>(.)<\/span> baño'
    baños = re.search(regexBaños, str(soup_casa))
    print(baños.group(1), end=" baño/s\n")

    # Teléfono
    regexTfno = 'href="tel:(\d{9})">'
    tefefono = re.search(regexTfno, str(soup_casa))
    print("Teléfono: ", end="")
    print(tefefono.group(1))


    print("**************************************************")