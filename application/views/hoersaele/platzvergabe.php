<div class="container">
  <div class="hoersaal">
<table>
<?php
print('<thead><tr><th colspan="13"><p><strong>'.$raum.'</strong></p></th></tr></thead>'); //Raumnummer und schwarzer balken (irgenwie dynamisch generieren?)
$reiheLength = count($reihe); //Bestimmt Länge von Array $reihe
$reihenNummer = 0; //Counter für Reihennummer
$MartrNr = [69696969,12345678,11581029,99999999,11581029,11581029,11581029,11581029];
$MartrNrLength = count($MartrNr);
$platznummer = 1; //counter Variabel für Platznummer
/* So oft durchlaufen wie der Array lang ist */
for($i=0;$i<$reiheLength;$i++){
  $reihenNummer++;
  print ('<tr><td class="noBorder">Reihe ' .$reihenNummer. ' </td>');
  /* Erste Reihe besetzen und dann jede ungerade */
  if($i==0 || $i%2==0){
    for($j=0;$j<$platzAnzahl[$i];$j++){
      /* Den ersten Platz jeder Reihe, ab da jeden 3. besetzen */
      if($j==0 || $j%3==0){
        if($MartrNrLength>=$platznummer){
        print ('<td>Platz ' . $platznummer . ':<br>'. $MartrNr[$platznummer-1] . '</td>');
        $platznummer++;
        }
        else{
          print('<td></td>');
        }
      }
      else{
        print ('<td class="tdgrey"></td>');
      }
    }
    print('<td class="noBorder">Reihe '.$reihenNummer. '</td></tr>');
  }
  /* Wenn Reihe ungerade, nicht besetzen */
  else{
    for($j=0;$j<$platzAnzahl[$i];$j++){
    print ('<td class="tdgrey"></td>');
    }
    print('<td class="noBorder">Reihe '.$reihenNummer. '</td></tr>');
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
   <td><strong>18</strong></td>
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
<button type="button" class="btn btn-default" onClick="javascript:location.href='localhost/my_project/secondtry/application/views/zhg004.php" style="float: right; margin-left: 3px;"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;Speichern
</button>
<form method="get" action="">
<button type="button" class="btn btn-default" onClick="printpage()" style="float: right;"><span class="glyphicon glyphicon-print"></span>&nbsp;Drucken</button>
</form>
<br><br>
</div>
</body>
</html>
