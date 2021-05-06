# Prueba de scraper de Fotocasa con Selenium 
import time
from selenium.webdriver.common.keys import Keys
from selenium import webdriver
from bs4 import BeautifulSoup
from selenium.webdriver.common.action_chains import ActionChains

# 1.- Conexión a la página web de fotocasa

#driver = webdriver.Chrome(executable_path=r'chromedriver')
driver = webdriver.Chrome('chromedriver')
driver.get("https://www.fotocasa.es/es")
driver.maximize_window()
driver.implicitly_wait(5) # Tiempo de espera (inicialmente 10s)
# 2.- Saltarse la alerta de cookies, en caso de que hubiese
try:
    driver.find_element_by_xpath('//*[@class="sui-AtomButton sui-AtomButton--primary sui-AtomButton--solid sui-AtomButton--center "]').click()
except:
    time.sleep(2)

# En caso de querer hacer scraping sobre locales en alquiler
""" 
alquilar = driver.find_element_by_xpath('.//div[@class="re-Search-selectorContainer re-Search-selectorContainer--rent"]')
alquilar.click()"""

# 3.- Hacer búsqueda en el campo de texto
time.sleep(1)
buscador = driver.find_element_by_xpath('.//div[@class="sui-MoleculeAutosuggest-input-container"]/input')
buscador.click()
# Campo a rellenar por el usuario
localidad = 'Oviedo' 
buscador.send_keys(localidad) #Nombre de la ciudad o pueblo a buscar
time.sleep(1)
buscador.send_keys(Keys.ENTER)

# 4.- Recogemos los campos de cada oferta individualmente
html_txt = driver.page_source
print(html_txt)
soup = BeautifulSoup(html_txt, 'html.parser')
listaProductos = []
result = soup.select('re-Card-secondary')
productos = soup.find_all('div', class_="re-Card-secondary")
print(productos)
print(result)

for producto in productos:
    titulo=producto.find('title').getText()
    listaProductos.append(titulo)
    url=producto.find('href').getText()
    listaProductos.append(url)