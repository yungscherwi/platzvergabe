import csv
import openpyxl
import xlrd

wb = openpyxl.Workbook() #open new workbook and activate it
ws = wb.active

f = open('C:\\xampp\\htdocs\\platzvergabe\\application\\models\\uploads\\test.csv')
reader = csv.reader(f, delimiter='?')#siehe zeile 22 
for row in reader:
    ws.append(row)
f.close()

wb.save('C:\\xampp\\htdocs\\platzvergabe\\application\\models\\file.xlsx') #save as xlsx to work with xlrd-package

rb1 = xlrd.open_workbook("C:\\xampp\\htdocs\\platzvergabe\\application\\models\\file.xlsx")
rb2 = rb1.sheet_by_index(0) #erste Tabelle
rb = rb2.col_values(0) #erste Spalte. CSV to XLSX presst jede row in eine Zelle

for i in range (1, len(rb)):
    rb[i] = rb[i].split(";")#split the string by ;

for i in range(1, len(rb)):#print
    print(int(rb[i][0]))