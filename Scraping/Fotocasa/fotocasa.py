# Scraper para fotocasa con BeautifulSoup
import requests
from bs4 import BeautifulSoup


## PASO 1: conectarse a la web de fotocasa

url_base = "https://www.fotocasa.es/es/comprar/viviendas/"
localidad = "ponga" ## Localidad a introducir por el usuario
url_final = url_base + localidad +"/todas-las-zonas"
page = requests.get(url_final)

# Imprime el contenido de la página
#print(page.content)

# Si imprime 200 es que ha conectado correctamente
print(page.status_code)


## PASO 2: seleccionar el contenido a scrapear 
soup = BeautifulSoup(page.content, 'html.parser')
html = list(soup.children)

#print(soup)

# Encontrar este div: <div class="re-FeedProperties-results">
aux = soup.find_all('<div class="class="re-Card is-preloaded"">')


## PASO 3: pasar el contenido scrapeado a un fichero