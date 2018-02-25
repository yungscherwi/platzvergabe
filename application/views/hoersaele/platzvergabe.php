<div class="container">
  <div class="hoersaal">
<table>
<?php
print('<thead><tr><th colspan="13"><p><strong>'.$raum.'</strong></p></th></tr></thead>'); //Raumnummer und schwarzer balken (irgenwie dynamisch generieren?)
$reiheLength = count($reihe); //Bestimmt Länge von Array $reihe
$reihenNummer = $reiheLength; //Counter für Reihennummer
//$MartrNr !!! MUSS AUCH noch REVERSED WERDEN, SONST FALSCHE REIHENFOLGE BEI LISTE FÜR KLAUSURVERANTWORTLICHEN
$MartrNrLength = count($MartrNr);
$platznummer = $MartrNrLength; //counter Variabel für Platznummer
$sitzplaetze=$plaetze; //weil $plaetze als Counter benötigt
//<td class="noBorder" style="background-color: #FFFFFF"></td> Sperrplatz Code
print_r(count($reihe));
print_r($sperrplatzreihe);
print_r(count($sperrplaetze));
print_r($maxPlatzAnzahl);
//print_r($sperrplatzcheck);
$sperrplatzcounter=0;
print_r($sperrplaetze[$sperrplatzcounter]);
//Hier beginnt der eigentliche Platzvergabe-Algorithmus
/* So oft durchlaufen wie der Array lang ist */
for($i=0;$i<$reiheLength;$i++){
  print ('<tr><td class="noBorder">Reihe ' .$reihenNummer. ' </td>');
  /* Wenn ungerade reihenanzahl,dann: */
  if($reiheLength%2!=0){
    /*1. Reihe und jede ungerade */
  if($i==($reiheLength) || $i%2==0){
    //Zentrieren durch Einfügen leerer Zellen
    if($maxPlatzAnzahl>$platzAnzahl[$i]){
      $filler=($maxPlatzAnzahl-$platzAnzahl[$i])/2;
      for($k=0;$filler>$k;$k++){
        print('<td class="noBorder"></td>');
      }
    }
    //Durchlaufen der Plätze
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
          //Wenn MatrNrLength kleiner gleich Platznummer-> Platz 1 $$
          if(($MartrNrLength>=$platznummer)&&($plaetze<=$MartrNrLength)){
            print ('<td>Platz ' . $platznummer . ':<br>'. $MartrNr[$platznummer-1] . '</td>');
            $platznummer--;
            $plaetze--;
          }else{
            print('<td></td>');
            $plaetze--;
          }
      }
    }
      else{ //wenn nicht nicht besetzbar
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
    print('<td class="noBorder">Reihe '.$reihenNummer. '</td></tr>');
    }
  }
  // Der selbe Algorithmus nochmal nur für gerade Reihenanzahl
  else{
    /*Wenn Counter i gleich Länge des Arrays besetzen! */
  if($i==($reiheLength) || $i%2!=0){
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
          //Wenn MatrNrLength kleiner gleich Platznummer-> Platz 1 $$
          if(($MartrNrLength>=$platznummer)&&($plaetze<=$MartrNrLength)){
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
        if((($reihe[$i])==$sperrplatzreihe[$sperrplatzcounter])&&(($j+1)==$sperrplaetze[$sperrplatzcounter])){
          if((count($sperrplaetze))>($sperrplatzcounter+1)){
            $sperrplatzcounter++;
          }
          print('<td class="noBorder" style="background-color: 	#8b0000"></td>');
        }
        else{
        print ('<td class="tdgrey"></td>');
      }
    }}
    print('<td class="noBorder">Reihe '.$reihenNummer. '</td></tr>');
  }
  /* Sonst nicht besetzen */
  else{
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
    print('<td class="noBorder">Reihe '.$reihenNummer. '</td></tr>');
    }
  }
    $reihenNummer--;
}
 ?>
 <!-- Rest der Tabelle-->
 <tr class="noBorder">
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
 </tr>
 <tr class="noBorder">
   <td><strong>Sitzeplätze: </strong></td>
   <!--Gibt Anzahl der Sitzplätze dynamisch an-->
   <?php print('<td><strong>'.$sitzplaetze.'</strong></td>');?>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
 </tr>
 <tr>
   <td class="noBorder"></td>
   <td colspan="9" style="height: 100px; background-color: #17202A"><p style="text-align: center; color: #FFFFFF"><strong> Rednerpult</strong></p></td>
   <td class="noBorder"></td>
   <td class="noBorder"></td>
 </tr>
</table>
</div>
<!-- Buttons -->
<br><br>
<form method="get" action="">
<button type="button" class="btn btn-default" onClick="printpage()" style="float: right;"><span class="glyphicon glyphicon-print"></span>&nbsp;Drucken</button>
</form>
<br><br>
</div>
</body>
</html>
