# Web scraper para fotocasa

# Imports
import re
import requests
from bs4 import BeautifulSoup
import json

import mysql.connector

def scraper(localidad):
    json_string = []
    tipo = 'compra'

    for paginas in range(2,50):
            
        # Conseguimos la URL
        url_base = "https://www.fotocasa.es/es/comprar/viviendas/"
        url = url_base + localidad +"-provincia/todas-las-zonas/l/" + str(paginas)
        #print(url)



       
        con = mysql.connector.connect(host="localhost",user='root',passwd='',database='recomendador')
        cur = con.cursor()
        
        # Hacemos la petición
        page = requests.get(url)
        #print(page.status_code)

        # Imprimimos el contenido de la página
        soup = BeautifulSoup(page.content, 'html.parser')
        #print(soup)

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
            #print(url_piso)
            viviendas.append(url_piso)

        # Una vez tenemos la URL de la vivienda en concreto, la scrapeamos
        for i in range(0, len(viviendas)):
            vivienda = requests.get(viviendas[i])
            #print("--------------------------")
            #print(viviendas[i])
            #print("--------------------------")
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
            #print(titulo)

            # Descripción
            regexDescripcion = 'class="fc-DetailDescription">(.*)<\/p><\/div><\/div><div class="sui'
            if str(soup_casa).find("DetailDescription"):
                descripcion = re.search(regexDescripcion, str(soup_casa))
                if descripcion != None:
                    descripcion = descripcion.group(1)
                    descripcion = re.sub(r'\<.*?\>', '', descripcion)
                else:
                    print("descripcion no encontrada")
                    descripcion = "Descripción no disponible"
            else:
                descripcion = "Descripción no disponible"
            #print(descripcion, end= "\n")

            # Imagen de la vivienda
            regexImagen = '(https:\/\/static\.inmofactory\.com\/images\/inmofactory\/documents\/\d+\/\d+\/\d+\/\d+\.jpg)\?rule=\w+" type="image\/webp"'
            if str(soup_casa).find("picture"):
                imagen = re.search(regexImagen, str(soup_casa))
                if imagen != None:
                    imagen = imagen.group(1) + "?rule=web_948x542_webp_50"
                else:
                    print("Imagen no encontrada")
                    imagen = "Imagen no disponible"
            else:
                imagen = "Imagen no disponible"
            #print(imagen, end= " <-- es la URL de la imagen\n")

            # Número Metros Cuadrados
            regexMetros = '<span>(\d{1,7})<\/span> m²'
            if str(soup_casa).find("m²"):
                metros = re.search(regexMetros, str(soup_casa))
                if metros != None:
                    metros = metros.group(1)
                else:
                    print("No se especifica el número de m² en la vivienda")
                    metros = -1
            else:
                metros = -1
            #print(metros, end= " m²\n")

            # Precio
            regexPrecio = '<span class="re-DetailHeader-price">(.*) €<\/span>'
            precio = re.search(regexPrecio, str(soup_casa))
            if precio != None:
                precio = precio.group(1)
                precio = precio.replace('.', '')
            else:
                print("No se especifica precio")
                precio = -1

            # Número Habitaciones
            regexHabs = '<span>(.)<\/span> habs'
            if str(soup_casa).find("hab"):
                habs = re.search(regexHabs, str(soup_casa))
                if habs != None:
                    habs = habs.group(1)
                else:
                    habs = 0
                    print("No se especifica el número de baños en la vivienda")
            else:
                habs = 0
            #print(habs, end=" habitaciones\n")

            # Número Baños
            regexBanos = '<span>(.)<\/span> baño'
            if str(soup_casa).find("baño"):
                banos = re.search(regexBanos, str(soup_casa))
                if banos != None:
                    banos = banos.group(1)
                else:
                    print("No se especifica el número de baños en la vivienda")
                    banos = 0
            else:
                banos = 0
            #print(baños, end=" baños\n")

            # Teléfono
            regexTfno = 'href="tel:(\d{9})">'
            if str(soup_casa).find("href=\"tel"):
                tefefono = re.search(regexTfno, str(soup_casa))
                if tefefono != None:
                    tefefono = tefefono.group(1)
                else:
                    tefefono = -1
            else:
                tefefono = -1
            #print(tefefono)

            data = {"Localidad": localidad,"Titulo": titulo,"Metros": metros,"Precio": precio, "Habitaciones": habs,"Baños": baños,"Telefono": tefefono,"Descripcion": descripcion,"Url": viviendas[i], "Imagen": imagen}
            json_string.append(data)


            sql = 'insert into inmuebles(Localidad, Titulo, Metros, Precio, Habitaciones, Banos, Telefono, Descripcion, Url, Url_imagen) values (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)'
            datos = [localidad, titulo, metros, precio, habs, banos, tefefono, descripcion, viviendas[i], imagen]
            cur.execute(sql, datos)
            con.commit()

        return json_string
    
# Se crea el JSON 

def scrapeo_init():
    provincias = ['araba-alava','albacete','alicante','almeria','asturias','avila','badajoz','barcelona','burgos','caceres','cadiz','cantabria','castellon','ciudad-real','cordoba','a-coruna','cuenca','girona','granada','guadalajara','gipuzkoa','huelva','huesca','illes-baleares','jaen','leon','lleida','lugo','madrid','malaga','murcia','navarra','ourense','palencia','las-palmas','pontevedra','la-rioja','salamanca','segovia','sevilla','soria','tarragona','santa-cruz-de-tenerife','teruel','toledo','valencia','valladolid','bizkaia','zamora','zaragoza']
    json_final = []
    for provincia in provincias:
        print(provincia)
        json = scraper(provincia) #Tiene que ser en minuscula
        json_final.append(json)
    return json_final

json_final = scrapeo_init() #Tiene que ser en minuscula

with open('dataCompra.json', 'w', encoding='utf-8') as f:
    json.dump(json_final, f, ensure_ascii=False, indent=4)
