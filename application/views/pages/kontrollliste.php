<table class="table">
  <thead>
    <tr>
      <th scope="col">Matrikelnummer</th>
      <th scope="col">Nachname</th>
      <th scope="col">Vorname</th>
      <th scope="col">Anwesend</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $matrikelnummerLength = count($matrikelnummern);

  for($i=0; $i<$matrikelnummerLength; $i++){
    //Erstellen eines inputs um übergabe der enthaltenen Daten zu ermöglichen
      print ('<tr>
            <td>'.$matrikelnummern[$i].'</td>
            <td>'.utf8_encode($nachnamen[$i]).'</td>
            <td>'.utf8_encode($vornamen[$i]).'</td>
            <td></td>
          </tr>');
    }
    ?>
  </tbody>
</table>
