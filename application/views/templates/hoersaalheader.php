<!doctype html>
<html lang="en">
  <head>
    <title>Platzvergabe</title>
    <!-- Required Meta Tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS Vielleicht eins weglassen? -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <!-- Eigene CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>css/table.css">
    <!--AJAX-Funktion für Spalten PopUp-->
    <script>
    function showReihen(int){
      if(int.length == 0){
        document.getElementById('output').innerHTML = '';
      } else{
        //AJAX REQUEST
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){          //prüft ob serververbindung besteht
          if(this.readyState == 4 && this.status == 200){
            document.getElementById('output').
            innerHTML = this.responseText;
          }
        }
        //aufruf der funktion im controller hoersaele  + Übergabe der Eingabe
        xmlhttp.open("GET", "hoersaele/reihen?q="+int, true);
        xmlhttp.send();
      }
    }
    </script>
    <script type="text/javascript">
  		function printpage() {
  			window.print();
  		}
  	</script>
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
  </div>
</div>
</nav>
<div class="container">
