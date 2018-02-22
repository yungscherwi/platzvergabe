<div class="container">
  <div class="hoersaal">
<table>
<?php
print('<thead><tr><th colspan="13"><p><strong>'.$raum.'</strong></p></th></tr></thead>'); //Raumnummer und schwarzer balken (irgenwie dynamisch generieren?)
$reiheLength = count($reihe); //Bestimmt Länge von Array $reihe
$reihenNummer = $reiheLength; //Counter für Reihennummer
//$MartrNr !!! MUSS AUCH NOCH REVERSED WERDEN, SONST FALSCHE REIHENFOLGE BEI LISTE FÜR KLAUSURVERANTWORTLICHEN
$MartrNrLength = count($MartrNr);
$platznummer = $MartrNrLength; //counter Variabel für Platznummer
$sitzplaetze=$plaetze; //weil $plaetze als Counter benötigt

//<td class="noBorder" style="background-color: #FFFFFF"></td> Sperrplatz Code
print_r($reihe);
print_r($sperrplatzreihe);
print_r($sperrplaetze);
//print_r($sperrplatzcheck);
$sperrplatzcounter=0;
print_r($sperrplaetze[$sperrplatzcounter]);


//Hier beginnt der eigentliche Platzvergabe-Algorithmus
/* So oft durchlaufen wie der Array lang ist */
if($sperrplatzcheck==1){
for($i=0;$i<$reiheLength;$i++){
  print ('<tr><td class="noBorder">Reihe ' .$reihenNummer. ' </td>');
  /* Wenn ungerade reihenanzahl,dann: */
  if($reiheLength%2!=0){
    /*Erste Reihe und dann jede 2. Reihe besetzen*/
  if($i==($reiheLength) || $i%2==0){
    for($j=0;$j<$platzAnzahl[$i];$j++){
      if((($reihe[$i])==$sperrplatzreihe[$sperrplatzcounter])&&(($j+1)==$sperrplaetze[$sperrplatzcounter])){
          print('<td class="noBorder" style="background-color: #8a2be2"></td>');
        }
      else{
      /* Den ersten Platz jeder Reihe, ab da jeden 3. besetzen */
        if($j==0 || $j%3==0){
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
      else{
        print ('<td class="tdgrey"></td>');
      }
    }
    print('<td class="noBorder">Reihe '.$reihenNummer. '</td></tr>');
    }
  }
  /* Sonst nicht besetzen */
  else{
    for($j=0;$j<$platzAnzahl[$i];$j++){
    print ('<td class="tdgrey"></td>');
    }
    print('<td class="noBorder">Reihe '.$reihenNummer. '</td></tr>');
    }
  }
  // Das selbe nochmal nur für gerade Reihenanzahl
  else{
    /*Wenn Counter i gleich Länge des Arrays besetzen! */
  if($i==($reiheLength) || $i%2!=0){
    for($j=0;$j<$platzAnzahl[$i];$j++){
      //Bestimmt die Stelle des Sperrplatzes
      if((($reihe[$i])==$sperrplatzreihe[$sperrplatzcounter])&&(($j+1)==$sperrplaetze[$sperrplatzcounter])){
          print('<td class="noBorder" style="background-color: #8a2be2"></td>');
        }
        /* Den ersten Platz jeder Reihe, ab da jeden 3. besetzen */
        if($j==0 || $j%3==0){
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
      else{
        print ('<td class="tdgrey"></td>');
      }
    }
    print('<td class="noBorder">Reihe '.$reihenNummer. '</td></tr>');
  }
  /* Sonst nicht besetzen */
  else{
    for($j=0;$j<$platzAnzahl[$i];$j++){
      //Sperrplatz Bestimmung
      if((($reihe[$i])==$sperrplatzreihe[$sperrplatzcounter])&&(($j+1)==$sperrplaetze[$sperrplatzcounter])){
          print('<td class="noBorder" style="background-color: #8a2be2"></td>');
        }
        else{
    print ('<td class="tdgrey"></td>');
  }}
    print('<td class="noBorder">Reihe '.$reihenNummer. '</td></tr>');
    }
  }
    $reihenNummer--;
}
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
