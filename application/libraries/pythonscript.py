import csv
import openpyxl
import xlrd

wb = openpyxl.Workbook() #open new workbook and activate it
ws = wb.active

f = open('/Users/leonscherweit/.bitnami/stackman/machines/xampp/volumes/root/htdocs/platzvergabe/uploads/liste.csv')
reader = csv.reader(f, delimiter=';')
for row in reader:
    ws.append(row)
f.close()

wb.save('/Users/leonscherweit/.bitnami/stackman/machines/xampp/volumes/root/htdocs/platzvergabe/uploads/liste.xlsx') #save as xlsx to work with xlrd-package

rb1 = xlrd.open_workbook("/Users/leonscherweit/.bitnami/stackman/machines/xampp/volumes/root/htdocs/platzvergabe/uploads/liste.xlsx")
rb2 = rb1.sheet_by_index(0) #erste Tabelle
rb = rb2.col_values(0) #erste Spalte. CSV to XLSX presst jede row in eine Zelle

for i in range (1, len(rb)):
    rb[i] = rb[i].split(";")#split the string by ;

for i in range(1, len(rb)):#print
    print(int(rb[i][0]))
