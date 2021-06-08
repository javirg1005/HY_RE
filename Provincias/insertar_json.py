import json
#import mysql.connector

'''
## BASE DE DATOS Alternativa
con = mysql.connector.connect(host="localhost",user='root',passwd='',database='recomendador')
cur = con.cursor()
'''

tipo = 'compra' #o alquiler?
nombre = 'dataCompra.json' #Nombre del json


with open("dataCompra.json", 'r',encoding='utf-8') as f:
    data = json.load(f)
    '''
    data = str(data)
    data = data.replace('],[',',')
    data = data.replace(']]',']')
    data = data.replace('[[','[')
    #data = json.load(data)

print(data)
#borramos contenido json
a_file = open("./dataCompra.json", "w")
a_file.truncate()
a_file.close()

#borramos contenido json
final = open('./dataCompra.json', 'a')
final.write(data)
final.close()
'''

absa = data['Titulo']
print(absa)
'''
for i in data
    for j in i:
        ## BASE DE DATOS Alternativa
        con = mysql.connector.connect(host="localhost",user='root',passwd='',database='recomendador')
        cur = con.cursor()
        sql = 'insert into inmuebles(Localidad, Pago, Titulo, Metros, Precio, Habitaciones, Banos, Telefono, Descripcion, Url, Url_imagen) values (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)'
        datos = [i[i]['localidad'], i.tipo, i.titulo, i.metros, i.precio, i.habs, i.baños, i.tefefono, i.descripcion, i.viviendas[i], i.imagen]
        cur.execute(sql, datos)
        con.commit()
'''

 