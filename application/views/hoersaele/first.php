<div class="container-fluid">   
  <?php echo form_open_multipart('hochladen/do_upload');?>
  <div id="dropdownlist" class="dropdownlist">
    <form method="get" id="hoersaal_auswahl" name="hoersaal_auswahl">
      <h2>ZHG-Hörsaal auswählen:</h2>
      <br>
      <select id="hoersaal">
          <option value="none">--Bitte auswählen--</option>
          <option value="zhg/view/001">ZHG 001 (Plätze: 31)</option>
          <option value="zhg/view/002">ZHG 002 (Plätze: 19)</option>
          <option value="zhg/view/003">ZHG 003 (Plätze: 17)</option>
          <option value="zhg/view/004">ZHG 004 (Plätze: 17)</option>
          <option value="zhg/view/005">ZHG 005 (Plätze: 17)</option>
          <option value="zhg/view/006">ZHG 006 (Plätze: 31)</option>
          <option value="zhg/view/007">ZHG 007 (Plätze: 32)</option>
          <option value="zhg/view/008">ZHG 008 (Plätze: 65)</option>
          <option value="zhg/view/009">ZHG 009 (Plätze: 64)</option>
          <option value="zhg/view/010">ZHG 010 (Plätze: 80)</option>
          <option value="zhg/view/011">ZHG 011 (Plätze: 153)</option>
          <option value="zhg/view/101">ZHG 101 (Plätze: 40)</option>
          <option value="zhg/view/102">ZHG 102 (Plätze: 41)</option>
          <option value="zhg/view/103">ZHG 103 (Plätze: 34)</option>
          <option value="zhg/view/104">ZHG 104 (Plätze: 40)</option>
          <option value="zhg/view/105">ZHG 105 (Plätze: 40)</option>
        </select>
  </form>
  </div>
  <br><br>
  <section>
    <h1>Hier hochladen!</h1>
    <div id="dropzone">
      <form action="<?php echo base_url();?>hochladen/upload" id="my-dropzone" class="dropzone" method="post" enctype="multipart/form-data">
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
          window.open('kontrollliste'); //öffnet Kontrollliste
          window.open(selectedHs); //öffnet Hörsaal

      }
</script>



