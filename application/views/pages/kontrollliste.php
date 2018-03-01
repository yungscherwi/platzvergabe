<h1>Kontrollliste</h1>
<table class="table">
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
    $matrikelnummerLength = count($matrikelnummern);
    $sitzliste=array();

  for($i=0; $i<$matrikelnummerLength; $i++){
    //Erstellen eines inputs um übergabe der enthaltenen Daten zu ermöglichen
      print ('<tr>
            <td>'.$matrikelnummern[$i].'</td>
            <td>'.$nachnamen[$i].'</td>
            <td>'.$vornamen[$i].'</td>
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
<h1>Sitzliste</h1>
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
    <!--Sortiert die Liste nach Nachamen von A-Z-->
    <?php
    usort($sitzliste, function($a, $b) {
    return $a['1'] <=> $b['1'];
});

  for($i=0; $i<$matrikelnummerLength; $i++){
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
