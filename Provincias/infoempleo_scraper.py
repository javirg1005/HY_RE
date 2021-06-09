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

for i in range (1, 20):

    url = url + str(i)

    # Hacemos la petición
    page = requests.get(url)
    #print(page.status_code)

    # Imprimimos el contenido de la página
    soup = BeautifulSoup(page.content, 'html.parser')
    #print(soup)

    """# Se escribe en un archivo la salida del HTML para poder pasarlo a regex más fácilmente
    file = open("empleoInfo.txt", "w+", encoding="utf-8")
    file.write(str(soup))"""

    empleos = str(soup).split('li class="featured"')
    print("----------------------------")

    for i in range (1,3):
        # Título
        regexTitulo = '<a href=.*\s*(.*)'
        resultado_titulo = re.search(regexTitulo, empleos[i])
        if resultado_titulo != None:
            print(resultado_titulo.group(1))
        
        # Localidad
        regexLocalidad = '<p class="block">\s+(.*)'
        resultado_localidad = re.search(regexLocalidad, empleos[i])
        if resultado_localidad != None:
            print(resultado_localidad.group(1))

        # Descripción
        regexDescripcion = '<p class="small">(.*)<'
        resultado_descripcion = re.search(regexDescripcion, empleos[i])
        if resultado_descripcion != None:
            print(resultado_descripcion.group(1))


        print(" ------------ fin oferta featured " + str(i) + "  ------------")


    empleos2 = str(soup).split('li class="offerblock"')
    print("----------------------------")

    for i in range (1,9):
        # Título
        regexTitulo = '<a href=.*">(.*)<'
        resultado_titulo = re.search(regexTitulo, empleos2[i])
        if resultado_titulo != None:
            print(resultado_titulo.group(1))
        
        # Localidad
        regexLocalidad = '<p class="block">\s+(.*)'
        resultado_localidad = re.search(regexLocalidad, empleos2[i])
        if resultado_localidad != None:
            print(resultado_localidad.group(1))

        # Descripción
        regexDescripcion = '<p class="small">(.*)<'
        resultado_descripcion = re.search(regexDescripcion, empleos2[i])
        if resultado_descripcion != None:
            print(resultado_descripcion.group(1))


        print(" ------------ fin oferta offerblock " + str(i) + "  ------------")