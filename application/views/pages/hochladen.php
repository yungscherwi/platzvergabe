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


<p>
Bitte laden Sie ihre Tabelle hoch.
</p>

<!-- Dropzone-Deklaration-->
<form id ="upload-widget" action="application/models/Studentenliste_upload.php" class="dropzone" method="post"></form>
