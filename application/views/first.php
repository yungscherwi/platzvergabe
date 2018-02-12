<div class="container">
  	<div id="dropdownlist" class="dropdownlist">
    	<form method="get" id="hoersaal_auswahl" name="hoersaal_auswahl">
    		<p>Hörsaal auswählen:</p>
  			<select id="hoersaal">
  				<option value="none">--Bitte auswählen--</option>
          <option value="index.php/controller/view001">ZHG 001</option>
          <option value="index.php/controller/view002">ZHG 002</option>
          <option value="index.php/controller/view003">ZHG 003</option>
  				<option value="index.php/controller/view004">ZHG 004</option>
          <option value="index.php/controller/view005">ZHG 005</option>
          <option value="index.php/controller/view006">ZHG 006</option>
          <option value="index.php/controller/view007">ZHG 007</option>
          <option value="index.php/controller/view008">ZHG 008</option>
          <option value="index.php/controller/view009">ZHG 009</option>
          <option value="index.php/controller/view010">ZHG 010</option>
          <option value="index.php/controller/view011">ZHG 011</option>
          <option value="index.php/controller/view101">ZHG 101</option>
          <option value="index.php/controller/view102">ZHG 102</option>
          <option value="index.php/controller/view103">ZHG 103</option>
          <option value="index.php/controller/view104">ZHG 104</option>
          <option value="index.php/controller/view105">ZHG 105</option>
  			</select>
		</form>
  	</div>
	<br><br>
	<section>
  		<h1 id="uploadueberschrift">Hier hochladen!</h1>
  		<div id="dropzone">
  			<form action="index.php/controller/upload" name="file" class="dropzone" method="post" enctype="multipart/form-data">
  			<div class="dz-message needsclick">
    			Drop files here or click to upload.<br><br><br>
    		<span class="note needsclick">(<strong>Es werden nur CSV Dateien unterstützt</strong>)</span>
  			</div>
			</form>
		</div>
	</section>
	<br><br>
	<button type="submit" form="hoersaal_auswahl" class="btn btn-default" onClick="goToNewPage()"><a>Abschicken</a></button>
</div>
</body>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>application/views/css/firststyle.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>application/views/css/dropzone.css">
<script src="<?php echo base_url(); ?>application/libraries/dropzone.js"></script>
<script src="<?php echo base_url(); ?>application/libraries/jquery.js"></script>
</html>