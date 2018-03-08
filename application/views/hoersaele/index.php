<div class="container-fluid"> 
  <h2>Prüfungsraum erstellen </h2>
  <br>
  <form action="hoersaele/create" method="post">
    <div class="form-group">
      <label for="hoersaal">Prüfungsraum</label>
      <input type="hoersaal" class="form-control" name="hoersaalID" placeholder="Bitte Namen eingeben" pattern="[A-Za-z0-9]+" title="Keine Sonderzeichen erlaubt" required>
    </div>
    <br>
    <!--onkeyup ruft ajax-script im header auf-->
    <div class="form-group">
      <label for="reihen">Anzahl der Reihen</label>
      <input type="reihen" class="form-control" name="reihen" onkeyup="showReihen(this.value)" placeholder="Bitte Anzahl der Reihen eingeben" pattern="[0-9]+" title="Es sind nur ganze Zahlen erlaubt." required>
    </div>
    <!--Output von Ajax-->
  <p><span id="reihen" style="font-weight:bold"></span></p>

  <!-- Sperrplatzabfrage-->
  <input type="checkbox" name="showSperrplaetze" onclick="showMe('sperrplatzabfrage')">Sperrplätze vorhanden 
  <!-- Wenn checked zeige an: -->
  <br><br>
 <div class id="sperrplatzabfrage" style="display:none">
  <label for="checkbox">Anzahl der Sperrplätze</label>
  <input type="sperrplaetze" class="form-control" name="checkbox" onkeyup="sperrplaetze(this.value)" placeholder="Bitte Anzahl der Sperrplätze eingeben" pattern="[0-9]+" title="Es sind nur ganze Zahlen erlaubt.">
<p><span id="sperrplaetze" style="font-weight:bold"></span></p>
</div>
  <br>
    <br>
    <br>
     <input type="submit" class="btn btn-primary" value="Speichern">
  </form>
</div>
