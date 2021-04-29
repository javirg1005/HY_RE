# Script para pasar un resultado de InfoJobs a un JSON
import re
import json

with open('resultado_infojobs_primero.txt', 'r', encoding="utf-8") as file:
    data = file.read()

with open('infojobs.json', 'w', encoding="utf-8") as f:
    json.dump(data, f,ensure_ascii=False)

absa = json.load("infojobs.json")
variable = f.stringify(absa)
var2 = variable.replace('/\\/g', '')
print(var2)