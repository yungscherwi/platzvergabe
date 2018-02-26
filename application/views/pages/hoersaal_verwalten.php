<div class="container-fluid">
  <br><br>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Hörsaal</th>
        <th scope="col">Anzahl der Plätze</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $hoersaalLength = count($hoersaalID);
    for($i=0; $i<$hoersaalLength; $i++){
      //Erstellen eines inputs um übergabe der enthaltenen Daten zu ermöglichen
        print ('<form action="hoersaal_delete" method="post"><tr>
              <td><input type="hidden" name="hoersaal" value="'.$hoersaalID[$i].'">'.$hoersaalID[$i].'</td>
              <td>'.$plaetze[$i].'</td>
              <td><input type="submit" class="btn btn-danger" value="Löschen">
               </td>
            </tr></form>');
      }
      ?>
    </tbody>
  </table>
</div>