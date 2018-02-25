<h1> Hörsaal zu klein </h1>
<br>
<p> Ihre Liste enthält <?php print_r(count($MartrNr)); ?> Studenten, der von ihnen gewählte Hörsaal verfügt aber nur über <?php print_r($plaetze); ?> Plätze.</p>
<p><?php echo anchor('hochladen', 'Zurück zur Platzvergabe'); ?></p>
