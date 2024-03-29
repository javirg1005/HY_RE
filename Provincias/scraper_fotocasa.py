# Web scraper para fotocasa

# Imports
import re
import requests
from bs4 import BeautifulSoup
import json

import mysql.connector

## BASE DE DATOS Alternativa
con = mysql.connector.connect(host="localhost",user='root',passwd='',database='recomendador')
cur = con.cursor()

# Conseguimos la URL
url_base = "https://www.fotocasa.es/es/comprar/viviendas/"
localidad = "oviedo" ## Localidad a introducir por el usuario
url = url_base + localidad +"/todas-las-zonas/l"
print(url)

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
json_string = []

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
    print("--------------------------")
    print(viviendas[i])
    print("--------------------------")
    #print(vivienda.status_code)

    # Imprimimos el contenido de la página
    soup_casa = BeautifulSoup(vivienda.content, 'html.parser')
    #print(soup_casa)

    # Se escribe en un archivo la salida del HTML de la vivienda para poder pasarlo a regex más fácilmente
    file = open("html_vivienda.txt", "w+", encoding="utf-8")
    file.write(str(soup_casa))
    
    

    ## ------------ Información por cada vivienda --------------- ##

    # Inicialización de variables para prevenir errores
    titulo = "Título no disponible"
    metros = " metros cuadrados no disponible"
    habs = "Nº de habitaciones no disponible"
    baños = "Nº de habitaciones no disponible"
    tefefono = "Nº de teléfono no disponible"

    # Título
    regexTitulo = '<h1 class="re-DetailHeader-propertyTitle">(.*)<\/h1>'
    if str(soup_casa).find("tit"):
        titulo = re.search(regexTitulo, str(soup_casa))
        if titulo != None:
            titulo = titulo.group(1)
        else:
            titulo = "Título no disponible"    
    else:
        titulo = "Título no disponible"
    print(titulo)

    # Descripción
    regexDescripcion = 'class="fc-DetailDescription">(.*)<\/p><\/div><\/div><div class="sui'
    if str(soup_casa).find("DetailDescription"):
        descripcion = re.search(regexDescripcion, str(soup_casa))
        if descripcion != None:
            descripcion = descripcion.group(1)
            descripcion = re.sub(r'\<.*?\>', '', descripcion)
        else:
            print("descripcion no encontrada")
    else:
        descripcion = "Descripción no disponible"
    print(descripcion, end= "\n")

    # Imagen de la vivienda
    regexImagen = '(https:\/\/static\.inmofactory\.com\/images\/inmofactory\/documents\/\d+\/\d+\/\d+\/\d+\.jpg)\?rule=\w+" type="image\/webp"'
    if str(soup_casa).find("picture"):
        imagen = re.search(regexImagen, str(soup_casa))
        if imagen != None:
            imagen = imagen.group(1) + "?rule=web_948x542_webp_50"
        else:
            print("Imagen no encontrada")
    else:
        imagen = "Imagen no disponible"
    print(imagen, end= " <-- es la URL de la imagen\n")

    # Número Metros Cuadrados
    regexMetros = '<span>(\d{1,7})<\/span> m²'
    if str(soup_casa).find("m²"):
        metros = re.search(regexMetros, str(soup_casa))
        if metros != None:
            metros = metros.group(1)
        else:
            print("No se especifica el número de m² en la vivienda")
    else:
        metros = "m² no disponible"
    print(metros, end= " m²\n")

    # Precio
    regexPrecio = '<span class="re-DetailHeader-price">(.*) €<\/span>'
    precio = re.search(regexPrecio, str(soup_casa))
    if precio != None:
        precio = precio.group(1)
        precio = precio.replace('.', '')
    else:
        print("No se especifica precio")

    # Número Habitaciones
    regexHabs = '<span>(.)<\/span> habs'
    if str(soup_casa).find("hab"):
        habs = re.search(regexHabs, str(soup_casa))
        if habs != None:
            habs = habs.group(1)
        else:
            print("No se especifica el número de baños en la vivienda")
    else:
        habs = "Nº de habitaciones no disponible"
    print(habs, end=" habitaciones\n")

    # Número Baños
    regexBaños = '<span>(.)<\/span> baño'
    if str(soup_casa).find("baño"):
        baños = re.search(regexBaños, str(soup_casa))
        if baños != None:
            baños = baños.group(1)
        else:
            print("No se especifica el número de baños en la vivienda")
    else:
        baños = "No disponible"
    print(baños, end=" baños\n")

    # Teléfono
    regexTfno = 'href="tel:(\d{9})">'
    if str(soup_casa).find("href=\"tel"):
        tefefono = re.search(regexTfno, str(soup_casa))
        if tefefono != None:
            tefefono = tefefono.group(1)
        else:
            tefefono = "Número no disponible"
    else:
        tefefono = "Número no disponible"
    print(tefefono)

    
    
    print("\n")
    print("**************************************************")
    
    sql = 'insert into inmuebles(Localidad, Titulo, Metros, Precio, Habitaciones, Banos, Telefono, Descripcion, Url, Url_imagen) values (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)'
    datos = [localidad, titulo, metros, precio, habs, baños, tefefono, descripcion, viviendas[i], imagen]
    cur.execute(sql, datos)
    con.commit()

# Se crea el JSON
'''
with open('Provincias/data.json', 'w', encoding='utf-8') as f:
    json.dump(json_string, f, ensure_ascii=False, indent=4)'''

#con.close()



