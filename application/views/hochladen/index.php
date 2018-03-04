<div class="container-fluid"> 
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
      <form action="<?php echo base_url() ?>hochladen/upload" id="mydropzone" class="dropzone">
      <div class="dz-message needsclick">
        Drop files here or click to upload.<br><br><br>
      <span class="note needsclick">(<strong>Es werden nur CSV Dateien unterstützt</strong>)</span>
      </div>
      </form>
    </div>
  </section>
  <br><br>
  	<button type="submit" form="hoersaal_auswahl" class="btn btn-primary" onClick="goToNewPage()" disabled>Abschicken</button>
  <br><br>  
</div>
<script type="text/javascript">
  Dropzone.options.mydropzone = {
    parallelUploads: 1, //nur ein upload möglich
    autoProcessQueue: true, //automatischer upload on
    maxFiles: 1, //man kann nur eine file hochladen
    acceptedFiles: ".csv", //nur .csv 
    init: function() {
      this.on("success", function() { //wenn hochgeladen, dann kann man auch weiter
        $('button:submit').attr('disabled', false);
      });
      this.on("addedfile", function(file) { //added button unter der file zum löschen der datei, falls man doch was falsches hochgeladen hat
        var removeButton = Dropzone.createElement("<button style='width: 70%; heigth: 70%;margin:auto;display:block;border-radius: 12px;border: none;margin-top: 5px;'>Remove file</button>");
        var _this = this;
        removeButton.addEventListener("click", function(e) {
          e.preventDefault();
          e.stopPropagation();
          _this.removeFile(file);
        });
        file.previewElement.appendChild(removeButton);
      });
    }
  };
</script>