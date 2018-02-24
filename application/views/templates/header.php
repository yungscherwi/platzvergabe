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
      function printpage() {
        window.print();
      }
    </script>
  </head>
  <!-- Header vorbei -->
<body>
    <a>
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Georg-August-Universit%C3%A4t_G%C3%B6ttingen_Logo.svg/571px-Georg-August-Universit%C3%A4t_G%C3%B6ttingen_Logo.svg.png" width="285" height="56" class="d-inline-block align-top" alt="">
    </a>
</body>