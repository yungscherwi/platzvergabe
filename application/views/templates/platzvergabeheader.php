<!doctype html>
<html lang="en">
  <head>
    <title>Platzvergabe</title>
    <!-- Required Meta Tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>../css/tables.css"-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>../css/default.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

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
    function goToNewPage() {
          var nr = document.getElementById("hoersaal");
          var selectedHs = nr.options[nr.selectedIndex].value;
          window.open(selectedHs); //öffnet Hörsaal
          window.open('kontrollliste'); //öffnet Kontrollliste
      }
    </script>
    <script type="text/javascript">
  		function printpage() {
  			window.print();
  		}
  	</script>
</head>
<body>
  <header>
    <div class="container-fluid logo-container">
      <img id="logo" src="http://www.uni-goettingen.de/img/redesign/logo.svg">
    </div>
  </header>
<div class="container">
