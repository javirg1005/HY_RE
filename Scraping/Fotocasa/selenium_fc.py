# Prueba de scraper de Fotocasa con Selenium 
import time
from selenium.webdriver.common.keys import Keys
from selenium import webdriver
from bs4 import BeautifulSoup
from selenium.webdriver.common.action_chains import ActionChains

#driver = webdriver.Chrome(executable_path=r'chromedriver')
driver = webdriver.Chrome('/path/to/chromedriver')
driver.get("https://www.fotocasa.es/es")
driver.maximize_window()

time.sleep(2)
alquilar = driver.find_element_by_xpath('.//div[@class="re-Search-selectorContainer re-Search-selectorContainer--rent"]')
alquilar.click()

time.sleep(1)
buscador = driver.find_element_by_xpath('.//div[@class="sui-MoleculeAutosuggest-input-container"]/input')
buscador.click()
buscador.send_keys('Málaga')
time.sleep(1)
buscador.send_keys(Keys.ENTER)

html_txt = driver.page_source
soup = BeautifulSoup(html_txt)
listaProductos = []
productos = soup.find_all('div', class_="re-Card-priceComposite")
for producto in productos:
    titulo=producto.find('span').getText()
    listaProductos.append(titulo)
print(listaProductos)