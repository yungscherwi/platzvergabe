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
    <!--onkeyup ruft ajax-script im header auf-->
    <input type="reihen" class="form-control" name="reihen" onkeyup="showReihen(this.value)" placeholder="Bitte Anzahl der Reihen eingeben">
  </div>
  <p><span id="output" style="font-weight:bold"></span></p>
  <br>
  <br>
   <input type="submit" class="btn btn-primary" value="Speichern">
</form>
