<h1> Hörsaal erstellen </h1>
<br><br>
<form action="hoersaele/create" method="post">
  <div class="form-group">
    <label for="hoersaal">Hörsaal</label>
    <input type="hoersaal" class="form-control" name="hoersaalID" placeholder="Bitte Hörsaalnamen eingeben">
  </div>
  <br>
  <!--onkeyup ruft ajax-script im header auf-->
  <div class="form-group">
    <label for="reihen">Anzahl der Reihen</label>
    <input type="reihen" class="form-control" name="reihen" onkeyup="showReihen(this.value)" placeholder="Bitte Anzahl der Reihen eingeben">
  </div>
  <!--Output von Ajax-->
<p><span id="reihen" style="font-weight:bold"></span></p>

<!-- Sperrplatzabfrage-->
<input type="checkbox" name="showSperrplaetze" onclick="showMe('sperrplatzabfrage')">Sperrplätze vorhanden (+Erklärung was Sperrplätze sind)
<!-- Wenn checked zeige an: -->
<br><br>
<div class id="sperrplatzabfrage" style="display:none">
  <label for="checkbox">Anzahl der Sperrplaetze</label>
  <input type="sperrplaetze" class="form-control" name="checkbox" onkeyup="sperrplaetze(this.value)" placeholder="Bitte Anzahl der Sperrplätze eingeben">
<p><span id="sperrplaetze" style="font-weight:bold"></span></p>
</div>
<br>


  <br>
  <br>
   <input type="submit" class="btn btn-primary" value="Speichern">
</form>
