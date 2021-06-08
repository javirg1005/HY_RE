import json
import mysql.connector


## BASE DE DATOS Alternativa
con = mysql.connector.connect(host="localhost",user='root',passwd='',database='recomendador')
cur = con.cursor()

tipo = 'compra' #o alquiler?
nombre = 'dataCompra.json' #Nombre del json

with open(nombre, 'r', encoding='utf-8') as f: #leer el json e insertarl
    json.dump(json_string, f, ensure_ascii=False, indent=4)



sql = 'insert into inmuebles(Localidad, Pago, Titulo, Metros, Precio, Habitaciones, Banos, Telefono, Descripcion, Url, Url_imagen) values (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)'
datos = [localidad, tipo, titulo, metros, precio, habs, baños, tefefono, descripcion, viviendas[i], imagen]
cur.execute(sql, datos)
con.commit()