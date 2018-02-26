<div class="container-fluid"> 
  <?php echo $error;?>
  <div id="dropdownlist" class="dropdownlist">
    <form method="get" id="hoersaal_auswahl" name="hoersaal_auswahl">
      <h2>Prüfungsraum auswählen:</h2>
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
  <section>
    <h1>Hier hochladen!</h1>
    <div id="dropzone">
      <form action="<?php echo base_url() ?>hochladen/upload" id="my-dropzone" class="dropzone">
      <div class="dz-message needsclick">
        Drop files here or click to upload.<br><br><br>
      <span class="note needsclick">(<strong>Es werden nur CSV Dateien unterstützt</strong>)</span>
      </div>
      </form>
    </div>
  </section>
  <br><br>
  	<button type="submit" form="hoersaal_auswahl" class="btn btn-primary" onClick="goToNewPage()">Abschicken</button>
  <br><br>
</div>
<script type="text/javascript">
  function goToNewPage() {
        var nr = document.getElementById("hoersaal");
        var selectedHs = nr.options[nr.selectedIndex].value;

        window.open(selectedHs); //window.location = selectedVal um es im selben Fenster zu öffnen (klappt bisher leider nicht)
  }
</script>
