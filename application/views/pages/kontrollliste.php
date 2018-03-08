<h1>Liste zur Identitätskontrolle</h1>
<table class="table" id='kontrollliste' >
  <thead>
    <tr>
      <th scope="col">Matrikelnummer</th>
      <th scope="col">Nachname</th>
      <th scope="col">Vorname</th>
      <!--th scope="col">Reihe</th-->
      <th scope="col">Platz</th>
      <th scope="col">Anwesend</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $matrikelnummerLength = count($matrikelnummern);                  //$matrikelnummerLength = matrikelnummern.length
    $sitzliste=array();                                               //$sitzliste = leerer array
  for($i=0; $i<$matrikelnummerLength; $i++){
    /*Erstellen eines inputs um übergabe der enthaltenen Daten zu ermöglichen
      utf8_encode für Umlaute  */
      print ('<tr>
            <td>'.$matrikelnummern[$i].'</td>
            <td>'.utf8_encode($nachnamen[$i]).'</td>
            <td>'.utf8_encode($vornamen[$i]).'</td>
            <td> Platz: '.($i+1).'</td>
            <td></td>
          </tr>');
          $student = [$matrikelnummern[$i], $nachnamen[$i], $vornamen[$i],"Platz: ".($i+1).""];  
          array_push($sitzliste, $student);                       
    }
    ?>
  </tbody>
</table>
<br>
<br>
<h1>Liste der Platzzuweisung</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Matrikelnummer</th>
      <th scope="col">Nachname</th>
      <th scope="col">Vorname</th>
      <!--th scope="col">Reihe</th-->
      <th scope="col">Platz</th>
    </tr>
  </thead>
  <tbody>
    
    <?php
    usort($sitzliste, function($a, $b) {                       //Sortiert die Liste nach Nachnamen von A-Z
    return $a['1'] <=> $b['1'];
});
  for($i=0; $i<$matrikelnummerLength; $i++){                   //Schleife für alle Klausurteilnehmer
                                                               //print Matrikelnr, Nachname, Vorname und Platz 
      print ('<tr>
            <td>'.$sitzliste[$i][0].'</td>                     
            <td>'.$sitzliste[$i][1].'</td>
            <td>'.$sitzliste[$i][2].'</td>
            <td>'.$sitzliste[$i][3].'</td>
          </tr>');   
    }
    ?>
  </tbody>
</table>