<title>Hochladen</title>
<br><br>

<div id="dropdownlist" class="dropdownlist">
  <form method="get" id="hoersaal_auswahl" name="hoersaal_auswahl">
    <p>Hörsaal auswählen:</p>
    <select id="hoersaal">
      <option value="hochladen">--Bitte auswählen--</option>
      <?php
      $hoersaalIDLength = count($hoersaalID);
      for($i=0; $hoersaalIDLength>$i; $i++){
        print ('<option value="hoersaele/view/'.$hoersaalID[$i].'">'.$hoersaalID[$i].' (Plätze: '. $plaetze[$i] . ') </option>');
      }
      ?>
    </select>
</form>
</div>
<br><br>
	<button type="submit" form="hoersaal_auswahl" class="btn btn-default" onClick="goToNewPage()">Abschicken</button>
<br><br>
