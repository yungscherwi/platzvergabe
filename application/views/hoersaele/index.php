<h1> Hörsaal erstellen </h1>
<br><br>
<form action="hoersaele/create" method="post">
  <div class="form-group">
    <label for="hoersaal">Hörsaal</label>
    <input type="hoersaal" class="form-control" name="hoersaalID" placeholder="Bitte Hörsaalnamen eingeben">
  </div>
  <br>
  <div class="form-group">
    <label for="reihen">Anzahl der Reihen</label>
    <input type="reihen" class="form-control" name="reihen" placeholder="Bitte Anzahl der Reihen eingeben">
  </div>
  <br>
  <div class="form-group">
    <label for="anzahlPlaetze">Anzahl der Plätze pro Reihe</label>
    <input type="anzahlPlaetze" class="form-control" name="anzahlPlaetze" placeholder="Bitte Anzahl der Plätze eingeben">
  </div>
  <br>
   <input type="submit" class="btn btn-primary" value="Speichern">
</form>
