import json
import mysql.connector

'''
## BASE DE DATOS Alternativa
con = mysql.connector.connect(host="localhost",user='root',passwd='',database='recomendador')
cur = con.cursor()
'''

tipo = 'compra' #o alquiler?
nombre = 'dataCompra.json' #Nombre del json


with open("C:\Users\holat\Documents\GitHub\PC23\Provincias\dataCompra.json") as f:
    data = json.load(f)

print(data)


'''
sql = 'insert into inmuebles(Localidad, Pago, Titulo, Metros, Precio, Habitaciones, Banos, Telefono, Descripcion, Url, Url_imagen) values (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)'
datos = [localidad, tipo, titulo, metros, precio, habs, baños, tefefono, descripcion, viviendas[i], imagen]
cur.execute(sql, datos)
con.commit()'''


for i in data:
    ## BASE DE DATOS Alternativa
    con = mysql.connector.connect(host="localhost",user='root',passwd='',database='recomendador')
    cur = con.cursor()
    sql = 'insert into inmuebles(Localidad, Pago, Titulo, Metros, Precio, Habitaciones, Banos, Telefono, Descripcion, Url, Url_imagen) values (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)'
    datos = [i.localidad, i.tipo, i.titulo, i.metros, i.precio, i.habs, i.baños, i.tefefono, i.descripcion, i.viviendas[i], i.imagen]
    cur.execute(sql, datos)
    con.commit()


 