#Platzvergabe
Um auszutesten bitte:

1.
application/config/config.php
Dort Zeile 26 zu
$config['base_url'] = 'http://localhost/platzvergabe/';
bei mir geht leider nur die IP und localhost funktioniert nicht

2.
SQL-Datenbank erstellen
http://localhost/phpmyadmin/
- Reiter Datenbanken auswählen

- Neue Datenbank anlegen
  Datenbankname: platzvergabe
  Kollation stehen lassen
  
- Erzeuge Tabelle
  Name: studentenlisten
  Anzahl der Spalten: 3
  
- Benennen der Tabellenspalten
  - Name: Martrnr Typ: INT Länge/Werte: 11
  - Name: Nachname Typ: VARCHAR Länge/Werte: 255
  - Name: Vorname Typ: VARCHAR Länge/Werte: 255
  -> Speichern
  
- Bei Bedarf können manuell Datensätze reingepackt werden, die werden dann unter localhost/platzvergabe/studentenlisten unformatiert ausgegeben

Aufruf der Startseite:
localhost/platzvergabe
