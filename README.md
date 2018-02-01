#Platzvergabe
Um auszutesten bitte:

1.
application/config/config.php
Dort Zeile 26 zu
$config['base_url'] = 'http://localhost/platzvergabe/';
bei mir geht leider nur die IP und localhost funktioniert nicht

2. .htaccess im Root-Verzeichnis erstellen mit folgendem Inhalt:

RewriteEngine on <br>
RewriteCond $1 !^(index\.php|assets|images|js|css|uploads|favicon.png) <br>
RewriteCond %(REQUEST_FILENAME) !-f <br>
RewriteCond %(REQUEST_FILENAME) !-d <br>
RewriteRule ^(.*)$ ./index.php/$1 [L] <br>

3. 
Schreiberlaubnis an uploads Ordner vergeben, sonst funktoniert der Upload nicht

4.
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

- Navbar auf allen Views
- CSS Ordner steht, js ordner muss noch angelegt werden (außerhalb von application, also an der root vom ordner)
- Hörsäle können im Hörsaal-Ordner abgespeichert werden
- Controller für jeder Funktion
- Routes für gekürzte Links

Relevante Änderungen in der Config (meist kommentiert eigentlich :D)
- autoload.php Zeile 92, Zeile 135
- config.php Zeile 26
- database.php Zeile 78,79,81 Um Verbindung zur SQL-Datenbank zu erstellen (wenn die nicht erstelt wurde, funktioniert die ganze Seite nicht)
- routes.php Zeile 4,5,6,7

Der Rest ist alles in den Standardordnern views, models und controllers
