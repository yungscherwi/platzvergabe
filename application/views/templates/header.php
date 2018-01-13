<!-- Wird auf jeder Seite geladen, alles hiernach ist Body und ist eingeschlossen durch footer.php-->
<!doctype html>
<html lang="en">
  <head>
    <title>Platzvergabe</title>
    <!-- Required Meta Tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>
<body>
<!-- Navbar https://getbootstrap.com/docs/4.0/components/navbar/-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo base_url();?>"> <!--Klick auf Banner oben verlinkt wieder auf Home-->
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Georg-August-Universit%C3%A4t_G%C3%B6ttingen_Logo.svg/571px-Georg-August-Universit%C3%A4t_G%C3%B6ttingen_Logo.svg.png" width="285" height="56" class="d-inline-block align-top" alt="">
      Automatisierte Platzvergabe
    </a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <div class="navbar-nav">
    <a class="nav-item nav-link" href="<?php echo base_url();?>">Home</a>
    <a class="nav-item nav-link" href="<?php echo base_url();?>hochladen">Hochladen</a>
    <a class="nav-item nav-link" href="<?php echo base_url();?>hoersaele">Hörsäle</a>
    <a class="nav-item nav-link" href="<?php echo base_url();?>studentenlisten">Studentenlisten</a>
  </div>
</div>
</nav>

<div class="container">
