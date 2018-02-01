<title>Hochladen</title>
<br><br>

<p>
Bitte laden Sie ihre Tabelle hoch.
</p>

<!-- Dropzone-Deklaration-->


<?php echo $error;?>

<?php echo form_open_multipart('hochladen/do_upload');?>

<input type="file" name="userfile" size="20" />

<br/><br/>

<input type="submit" value="Hochladen" />
<br><br>
<div id="dropdownlist" class="dropdownlist">
  <form method="get" id="hoersaal_auswahl" name="hoersaal_auswahl">
    <p>Hörsaal auswählen:</p>
    <select id="hoersaal">
      <option value="none">--Bitte auswählen--</option>
      <option value="hoersaele/view/zhg002">ZHG 002</option>
      <option value="hoersaele/view/zhg004">ZHG 004</option>
      <option value="hoersaele/view/zhg005">ZHG 005</option>
      <option value="hoersaele/view/zhg007">ZHG 007</option>
      <option value="hoersaele/view/zhg008">ZHG 008</option>
    </select>
</form>
</div>
<br><br>
	<button type="submit" form="hoersaal_auswahl" class="btn btn-default" onClick="goToNewPage()">Abschicken</button>
<br><br>


</form>
