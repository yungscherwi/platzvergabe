<div class="container">
<div class="hoersaal">
<table>
<?php
print('<thead align="center"><tr><th colspan="13"><p><strong>'.$raum.'</strong></p></th></tr></thead>'); //Raumnummer
$reiheLength = count($reihe); //Bestimmt Länge des Arrays $reihe
$reihenNummer = $reiheLength; //Counter für Reihennummer
$MartrNrLength = count($MartrNr);
$platznummer = $MartrNrLength; //Counter für vergebene Plätze, anhand der Studenten in der Liste
$sperrplatzcounter=0;
//Hier beginnt der eigentliche Platzvergabe-Algorithmus
//Entsprechend der Reihenanzahl durchlaufen
for($i=0;$i<$reiheLength;$i++){
  print ('<tr><td class="noBorder">Reihe ' .$reihenNummer. ' </td>');
  //Algorithmus für ungerade Reihenanzahl, bei gerader Reihenanzahl ab Zeile 104 weiter
  if($reiheLength%2!=0){
    //1. Reihe und jede ungerade
    if($i==($reiheLength) || $i%2==0){
      //Zentrieren durch Einfügen leerer Zellen anhand der maximalen Platzanzahl in einer Reihe im Hörsaal
      if($maxPlatzAnzahl>$platzAnzahl[$i]){
        $filler=($maxPlatzAnzahl-$platzAnzahl[$i])/2;
        for($k=0;$filler>$k;$k++){
          print('<td class="noBorder"></td>');
        }
      }
      //Durchlaufen der Plätze der jeweiligen Reihe
      for($j=0;$j<$platzAnzahl[$i];$j++){
        // Den ersten Platz jeder Reihe und dann jeden 3. besetzen
        if($j==0 || $j%3==0){
          //Sperrplatzüberprüfung, liegt Reihe und jeweiliger Platz in der Sperrplatz-Datenbank vor
          if((($reihe[$i])==$sperrplatzreihe[$sperrplatzcounter])&&(($j+1)==$sperrplaetze[$sperrplatzcounter])){
            //Wenn noch sperrplätze vorhanden, sperrplatzcounter hochsetzen
            if((count($sperrplaetze))>($sperrplatzcounter+1)){
              $sperrplatzcounter++;
            }
            print('<td class="noBorder" style="background-color: 	#8b0000"></td>');
          }
          else{
            //Wenn MatrNrLength größer gleich Platzanzahl der jew. Reihe und platznummer Counter (entspricht zu Beginn Länge der MatrNr)
            if(($MartrNrLength>=$platznummer)&&($MartrNrLength>=$plaetze)){
              print ('<td>Platz ' . $platznummer . ':<br>'. $MartrNr[$platznummer-1] . '</td>');
              $platznummer--;
              $plaetze--;
          }
          else{
            print('<td></td>');
            $plaetze--;
          }
        }
      }
      else{ //wenn nicht nicht zu besetzen
        //Sperrplatzüberprüfung
        if((($reihe[$i])==$sperrplatzreihe[$sperrplatzcounter])&&(($j+1)==$sperrplaetze[$sperrplatzcounter])){
          if((count($sperrplaetze))>($sperrplatzcounter+1)){
            $sperrplatzcounter++;
          }
          print('<td class="noBorder" style="background-color: 	#8b0000"></td>');
        }
        else{
          print ('<td class="tdgrey"></td>');
        }
      }
    }
    //Zentrieren durch Einfügen leerer Zellen
    if($maxPlatzAnzahl>$platzAnzahl[$i]){
      $filler=($maxPlatzAnzahl-$platzAnzahl[$i])/2;
      for($k=0;$filler>$k;$k++){
        print('<td class="noBorder"></td>');
      }
    }
    print('<td class="noBorder">Reihe '.$reihenNummer. '</td></tr>');
  }
  /* Sonst nicht besetzen */
  else{
    //Zentrieren durch Einfügen leerer Zellen
    if($maxPlatzAnzahl>$platzAnzahl[$i]){
      $filler=($maxPlatzAnzahl-$platzAnzahl[$i])/2;
      for($k=0;$filler>$k;$k++){
        print('<td class="noBorder"></td>');
      }
    }
    for($j=0;$j<$platzAnzahl[$i];$j++){
      //Sperrplatzüberprüfung
      if((($reihe[$i])==$sperrplatzreihe[$sperrplatzcounter])&&(($j+1)==$sperrplaetze[$sperrplatzcounter])){
        if((count($sperrplaetze))>($sperrplatzcounter+1)){
          $sperrplatzcounter++;
        }
        print('<td class="noBorder" style="background-color: 	#8b0000"></td>');
      }
      else{
          print ('<td class="tdgrey"></td>');
      }
    }
    //Zentrieren durch Einfügen leerer Zellen
    if($maxPlatzAnzahl>$platzAnzahl[$i]){
      $filler=($maxPlatzAnzahl-$platzAnzahl[$i])/2;
      for($k=0;$filler>$k;$k++){
        print('<td class="noBorder"></td>');
      }
    }
    //Reihennummer einfügen
    print('<td class="noBorder">Reihe '.$reihenNummer. '</td></tr>');
    }
  }
  // Der selbe Algorithmus nochmal nur für gerade Reihenanzahl
  else{
    // 1. Reihe und dann jede ungerade Reihe besetzen
    if($i==($reiheLength) || $i%2!=0){
      //Zentrieren durch Einfügen leerer Zellen
      if($maxPlatzAnzahl>$platzAnzahl[$i]){
        $filler=($maxPlatzAnzahl-$platzAnzahl[$i])/2;
        for($k=0;$filler>$k;$k++){
          print('<td class="noBorder"></td>');
        }
      }
      for($j=0;$j<$platzAnzahl[$i];$j++){
        /* Den ersten Platz jeder Reihe, ab da jeden 3. besetzen */
        if($j==0 || $j%3==0){
          //Sperrplatzüberprüfung
          if((($reihe[$i])==$sperrplatzreihe[$sperrplatzcounter])&&(($j+1)==$sperrplaetze[$sperrplatzcounter])){
            if((count($sperrplaetze))>($sperrplatzcounter+1)){
              $sperrplatzcounter++;
            }
            print('<td class="noBorder" style="background-color: 	#8b0000"></td>');
          }
          else{
            //Wenn MatrNrLength größer gleich Platzanzahl der jew. Reihe und platznummer Counter (entspricht zu Beginn Länge der MatrNr)
            if(($MartrNrLength>=$platznummer)&&($MartrNrLength>=$plaetze)){
              print ('<td>Platz ' . $platznummer . ':<br>'. $MartrNr[$platznummer-1] . '</td>');
              $platznummer--;
              $plaetze--;
            }
            else{
              print('<td></td>');
              $plaetze--;
            }
          }
        }
        else{
          //Sperrplatzüberprüfung
          if((($reihe[$i])==$sperrplatzreihe[$sperrplatzcounter])&&(($j+1)==$sperrplaetze[$sperrplatzcounter])){
            if((count($sperrplaetze))>($sperrplatzcounter+1)){
              $sperrplatzcounter++;
            }
            print('<td class="noBorder" style="background-color: 	#8b0000"></td>');
          }
          else{
            print ('<td class="tdgrey"></td>');
          }
        }
      }
        //Zentrieren durch Einfügen leerer Zellen
        if($maxPlatzAnzahl>$platzAnzahl[$i]){
          $filler=($maxPlatzAnzahl-$platzAnzahl[$i])/2;
          for($k=0;$filler>$k;$k++){
            print('<td class="noBorder"></td>');
          }
        }
        print('<td class="noBorder">Reihe '.$reihenNummer. '</td></tr>');
    }
    /* Sonst nicht besetzen */
    else{
      //Zentrieren durch Einfügen leerer Zellen
      if($maxPlatzAnzahl>$platzAnzahl[$i]){
        $filler=($maxPlatzAnzahl-$platzAnzahl[$i])/2;
        for($k=0;$filler>$k;$k++){
          print('<td class="noBorder"></td>');
        }
      }
      for($j=0;$j<$platzAnzahl[$i];$j++){
        if((($reihe[$i])==$sperrplatzreihe[$sperrplatzcounter])&&(($j+1)==$sperrplaetze[$sperrplatzcounter])){
          if((count($sperrplaetze))>($sperrplatzcounter+1)){
            $sperrplatzcounter++;
          }
          print('<td class="noBorder" style="background-color: 	#8b0000"></td>');
        }
        else{
          print ('<td class="tdgrey"></td>');
        }
      }
      //Zentrieren durch Einfügen leerer Zellen
      if($maxPlatzAnzahl>$platzAnzahl[$i]){
        $filler=($maxPlatzAnzahl-$platzAnzahl[$i])/2;
        for($k=0;$filler>$k;$k++){
          print('<td class="noBorder"></td>');
        }
      }
      print('<td class="noBorder">Reihe '.$reihenNummer. '</td></tr>');
    }
  }
  //Runterzählen des Reihencounters nach jeder Reihe
  $reihenNummer--;
}
//Print für eine Reihe Abstand
print('<tr><td class="noBorder"></td></tr><tr>');
  //Zentrieren durch Einfügen leerer Zellen
  for($k=0;($maxPlatzAnzahl/4)>$k;$k++){
    print('<td class="noBorder"></td>');
  }
//Print des Rednerpults
print('<td colspan="10" style="height: 100px; background-color: #17202A"><p style="text-align: center; color: #FFFFFF"><strong> Rednerpult</strong></p></td>
      </tr>
      </table>
      </div>
      <br>');
?>
</table>
</div>
</div>
</body>
</html>