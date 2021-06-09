#Scraper para la web de empleo Monster

# Imports
import re
import requests
import selenium
from selenium import webdriver
from bs4 import BeautifulSoup

# Conseguimos la URL
url_base = "https://www.monster.es/trabajo/buscar?q=&where="
localidad = "Asturias" ## Localidad a introducir por el usuario
url = url_base + localidad
print(url)

# Hacemos la petición
page = requests.get(url)
print(page.status_code)

# Imprimimos el contenido de la página
soup = BeautifulSoup(page.content, 'html.parser')
#print(soup)

# Se escribe en un archivo la salida del HTML para poder pasarlo a regex más fácilmente
file = open("code_monster.txt", "w+", encoding="utf-8")
file.write(str(soup))

#SELENIUM
browser = webdriver.Chrome()
browser.get(file)
nav = browser.find_element_by_css_selector(".results-list")
print(nav)

# Cierro el scraper
browser.close()
