<title>Hochladen</title>
<h1> Hochladen: </h1>
<br>

<?php echo $error;?>
<?php echo form_open_multipart('hochladen/do_upload');?>

<input type="file" name="userfile" size="20" />

<br><br><br>

<input type="submit" class="btn btn-primary" value="Hochladen" />

<br><br>
<div id="dropdownlist" class="dropdownlist">
  <form method="get" id="hoersaal_auswahl" name="hoersaal_auswahl">
    <h1>Hörsaal auswählen:</h1>
    <br>
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
	<button type="submit" form="hoersaal_auswahl" class="btn btn-primary" onClick="goToNewPage()">Abschicken</button>
<br><br>
