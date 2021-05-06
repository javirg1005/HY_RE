# Prueba de scraper de Fotocasa con Selenium 
import time
from selenium.webdriver.common.keys import Keys
from selenium import webdriver
from bs4 import BeautifulSoup
from selenium.webdriver.common.action_chains import ActionChains

#driver = webdriver.Chrome(executable_path=r'chromedriver')
driver = webdriver.Chrome('chromedriver')
driver.get("https://www.fotocasa.es/es")
driver.maximize_window()
driver.implicitly_wait(5) # Tiempo de espera (inicialmente 10s)
try:
    driver.find_element_by_xpath('//*[@class="sui-AtomButton sui-AtomButton--primary sui-AtomButton--solid sui-AtomButton--center "]').click()
except:
    time.sleep(2)

"""#TODO: Revisar ruta del re-Search-selectorContainer
alquilar = driver.find_element_by_xpath('.//div[@class="re-Search-selectorContainer re-Search-selectorContainer--rent"]')
alquilar.click()"""

time.sleep(1)
buscador = driver.find_element_by_xpath('.//div[@class="sui-MoleculeAutosuggest-input-container"]/input')
buscador.click()

localidad = 'Oviedo' # Campo a rellenar por el usuario

buscador.send_keys(localidad) #Nombre de la ciudad o pueblo a buscar
time.sleep(1)
buscador.send_keys(Keys.ENTER)

html_txt = driver.page_source
soup = BeautifulSoup(html_txt)
listaProductos = []
productos = soup.find_all('div', class_="re-Card-secondary")

for producto in productos:
    titulo=producto.find('span').getText()
    listaProductos.append(titulo)
print(listaProductos)