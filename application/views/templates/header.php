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
    <!-- Eigene CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>css/table.css">

    <!-- Javascripts-->
    <script type="text/javascript">
        function goToNewPage() {
          var nr = document.getElementById("hoersaal");
          var selectedHs = nr.options[nr.selectedIndex].value;
          window.open(selectedHs); //window.location = selectedVal um es im selben Fenster zu öffnen (klappt bisher leider nicht)
      }

    function showReihen(int){
      if(int.length == 0){
        document.getElementById('reihen').innerHTML = '';
      } else{
        //AJAX REQUEST
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){          //prüft ob serververbindung besteht
          if(this.readyState == 4 && this.status == 200){
            document.getElementById('reihen').
            innerHTML = this.responseText;
          }
        }
        //aufruf der funktion im controller hoersaele  + Übergabe der Eingabe
        xmlhttp.open("GET", "hoersaele/reihen?q="+int, true);
        xmlhttp.send();
      }
    }

    function showSperrplaetze(int){
      if(int.length == 0){
        document.getElementById('reihen').innerHTML = '';
      } else{
        //AJAX REQUEST
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){          //prüft ob serververbindung besteht
          if(this.readyState == 4 && this.status == 200){
            document.getElementById('reihen').
            innerHTML = this.responseText;
          }
        }
        //aufruf der funktion im controller hoersaele  + Übergabe der Eingabe
        xmlhttp.open("GET", "hoersaele/reihen?q="+int, true);
        xmlhttp.send();
      }
    }

    function showMe (box) {

    var chboxs = document.getElementsByName("showSperrplaetze");
    var vis = "none";
    for(var i=0;i<chboxs.length;i++) {
        if(chboxs[i].checked){
         vis = "block";
            break;
        }
    }
    document.getElementById(box).style.display = vis;


}
      function printpage() {
        window.print();
      }
    </script>
  <!-- Header vorbei -->
<body>
<!-- Navbar https://getbootstrap.com/docs/4.0/components/navbar/-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo base_url();?>"> <!--Klick auf Banner oben verlinkt wieder auf Home-->
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Georg-August-Universit%C3%A4t_G%C3%B6ttingen_Logo.svg/571px-Georg-August-Universit%C3%A4t_G%C3%B6ttingen_Logo.svg.png" width="285" height="56" class="d-inline-block align-top" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav navbar-center">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() ?>">Home</a>
          </li>
        </li>
          <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url();?>hochladen">Platzvergabe</a>
            </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url();?>uebersicht">Hörsaalübersicht</a>
          </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>hoersaele">Erstellen</a>

      </ul>
    </div>
</nav>

<div class="container">
