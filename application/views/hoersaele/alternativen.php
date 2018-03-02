<div class="container-fluid">
	<br><br>
	<div class="alert alert-danger" role="alert">
  		<h1> Hörsaal zu klein </h1>
		<br>
		<p> Der von ihnen gewählte Hörsaal bietet leider nicht genug Platz für alle teilnehmenden Studenten, bitte wählen Sie einen anderen aus. </p>
	</div>
	<p> Ihre Liste enthält <?php print_r(count($MartrNr)); ?> Studenten, der von Ihnen gewählte Hörsaal verfügt aber nur über <?php print_r($plaetze); ?> Plätze.</p>
	<p>Zurück zu:</p>
		<a href="<?php echo base_url();?>hochladen"><button class="btn btn-primary">Prüfungsräume</button></a>
		<a href="<?php echo base_url();?>zhg"><button class="btn btn-primary">ZHG</button></a>

		
</div>




