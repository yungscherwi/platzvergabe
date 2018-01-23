<!DOCTYPE html>

<meta charset="utf-8">

<title>Hochladen</title>


<!--
  DO NOT SIMPLY COPY THOSE LINES. Download the JS and CSS files from the
  latest release (https://github.com/enyo/dropzone/releases/latest), and
  host them yourself!
-->

<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
<!-- Funktioniert irgendwie nicht mit local hosting
<script src="../templates/dropzone.js"></script>
-->

<!-- Anderes Design muss noch gesucht/erstellt werden und vielleicht lokal gehosted-->
<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
<!-- Javascript, welches die Weiterleitung zum jeweiligen Hörsaal verantwortet-->
<script type="text/javascript">
    function goToNewPage() {
      var nr = document.getElementById("hoersaal");
      var selectedHs = nr.options[nr.selectedIndex].value;

      window.open(selectedHs); //window.location = selectedVal um es im selben Fenster zu öffnen (klappt bisher leider nicht)
  }
</script>

<div id="dropdownlist" class="dropdownlist">
  <form method="get" id="hoersaal_auswahl" name="hoersaal_auswahl">
    <p>Hörsaal auswählen:</p>
    <select id="hoersaal">
      <option value="none">--Bitte auswählen--</option>
      <option value="hoersaele/view/zhg004">ZHG 004</option>
    </select>
</form>
</div>
<br><br>


<p>
Bitte laden Sie ihre Tabelle hoch.
</p>

<!-- Dropzone-Deklaration-->
<form id ="upload-widget" action="application/models/Studentenliste_upload.php" class="dropzone" method="post"></form>

<br><br>
	<button type="submit" form="hoersaal_auswahl" class="btn btn-default" onClick="goToNewPage()">Abschicken</button>
