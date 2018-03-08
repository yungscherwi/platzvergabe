<div class="container-fluid">   
  <div id="dropdownlist" class="dropdownlist">
    <form method="get" id="hoersaal_auswahl" name="hoersaal_auswahl">
      <h2>ZHG-Hörsaal auswählen:</h2>
      <br>
      <select id="hoersaal">
          <option value="none">--Bitte auswählen--</option>
          <option value="hoersaele/view_zhg/001">ZHG 001 (Plätze: 31)</option>
          <option value="hoersaele/view_zhg/002">ZHG 002 (Plätze: 19)</option>
          <option value="hoersaele/view_zhg/003">ZHG 003 (Plätze: 17)</option>
          <option value="hoersaele/view_zhg/004">ZHG 004 (Plätze: 17)</option>
          <option value="hoersaele/view_zhg/005">ZHG 005 (Plätze: 17)</option>
          <option value="hoersaele/view_zhg/006">ZHG 006 (Plätze: 31)</option>
          <option value="hoersaele/view_zhg/007">ZHG 007 (Plätze: 32)</option>
          <option value="hoersaele/view_zhg/008">ZHG 008 (Plätze: 65)</option>
          <option value="hoersaele/view_zhg/009">ZHG 009 (Plätze: 64)</option>
          <option value="hoersaele/view_zhg/010">ZHG 010 (Plätze: 79)</option>
          <option value="hoersaele/view_zhg/011">ZHG 011 (Plätze: 153)</option>
          <option value="hoersaele/view_zhg/101">ZHG 101 (Plätze: 40)</option>
          <option value="hoersaele/view_zhg/102">ZHG 102 (Plätze: 41)</option>
          <option value="hoersaele/view_zhg/103">ZHG 103 (Plätze: 34)</option>
          <option value="hoersaele/view_zhg/104">ZHG 104 (Plätze: 40)</option>
          <option value="hoersaele/view_zhg/105">ZHG 105 (Plätze: 40)</option>
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

