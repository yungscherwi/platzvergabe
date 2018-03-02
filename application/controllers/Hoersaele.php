<?php
  class Hoersaele extends CI_Controller{
    //Hörsaal-Erstellen
    public function index(){

        $this->load->view('templates/header');
        $this->load->view('hoersaele/index');
        $this->load->view('templates/footer');

    }
    //Hörsaalaufruf
    public function view($page){ //Raumnummer aus Auswahl wird übergeben
      //Gibt Spalte 'reihe' als Array aus hoersaal aus
      $data['platzAnzahl'] = $this->hoersaal_model->get_platzAnzahl($page); //Plätze pro Reihe
      $data['reihe'] = $this->hoersaal_model->get_reihe($page);
      $data['plaetze'] = $this->hoersaal_model->get_plaetze($page); //Plätze des gesamten Hörsaals
      $data['sperrplatzcheck'] = $this->hoersaal_model->get_sperrplatzCheck($page);
      $sperrplatzcheck = $this->hoersaal_model->get_sperrplatzCheck($page);
      $data['sperrplatzreihe'] = $this->hoersaal_model->get_sperrplatzreihe($page);
      $sperrplatzreihe = $this->hoersaal_model->get_sperrplatzreihe($page);
      $data['sperrplaetze'] = $this->hoersaal_model->get_sperrplatz($page,$sperrplatzreihe,$sperrplatzcheck);
      $data['raum'] = $page;
      $data['MartrNr'] = $this->first_column();
      $data['maxPlatzAnzahl'] = $this->hoersaal_model->get_maxPlatzAnzahl($page);

      //wenn hörsaal groß genug, dann führe aus:
      if($data['plaetze']>=count($data['MartrNr'])){
        $this->load->view('templates/platzvergabeheader');
        $this->load->view('hoersaele/platzvergabe', $data);
        $this->load->view('templates/footer');
      }
      else{
        $this->load->view('templates/header');
        $this->load->view('hoersaele/alternativen', $data);
        $this->load->view('templates/footer');
      }
  }
//Kontrolliste Aufruf mit Übergabe des ausgewählten Hörsaals
  public function kontrollliste($page){
    $data['hoersaalID'] = $this->hoersaal_model->get_hoersaalID(); //liefert die HoersaalID Spalte aus hoersaal
    $data['plaetze'] = $this->hoersaal_model->get_allPlaetze(); //alle plätze als array
    $data['matrikelnummern'] = $this->first_column();
    $data['nachnamen'] = $this->nachname_column();
    $data['vornamen'] = $this->vorname_column();
    $data['reihe'] = $this->hoersaal_model->get_reihe($page);

    $this->load->view('templates/header');
    $this->load->view('pages/kontrollliste', $data);
    $this->load->view('templates/footer');
  }
  //Hörsaal-Erstellung Funktion
    public function create(){
      $raumInfo = [$_POST["hoersaalID"]]; //Variable aus der Form in einen Array speichern
      //Erstellung der jeweiligen Hörsaaltabelle
      $data['raumInfo'] = $this->hoersaal_model->createDatabase($raumInfo);

      //Insert in die jeweilige Hörsaaltabelle
      $i=0; //counter variable für anzahlPlaetze
      while(!empty($_POST["anzahlPlaetze".$i.""])){ //Solange wiederholen, bis anzahlPlaetze nicht vorhanden
        $insertInfo =  [$_POST["hoersaalID"],$_POST["anzahlPlaetze".$i.""], ($i+1)]; //Input für insert
        $i++;
        $data['insertInfo'] = $this->hoersaal_model->insertIntoDatabase($insertInfo);
      }
      //Insert der Sperrplätze
      $j=0; //counter variable für anzahlPlaetze
      while(!empty($_POST["sperrplatzreihe".$j.""])){ //Solange wiederholen, bis anzahlPlaetze nicht vorhanden
        $sperrplatzInfo =  [$_POST["hoersaalID"],$_POST["sperrplatzreihe".$j.""],$_POST["sperrplatznummer".$j.""]]; //Input für insert
        $j++;
        $data['sperrplatzInfo'] = $this->hoersaal_model->insertIntoSperrplaetze($sperrplatzInfo);
      }

      //Variablen für Platzberechnung
      $page = implode([$_POST["hoersaalID"]]);
      $platzAnzahl = $this->hoersaal_model->get_platzAnzahl($page); //Aufruf entsprechend übergebener Raumnummer
      $sperrplatzreihe = $this->hoersaal_model->get_sperrplatzreihe($page);
      $sperrplatzcheck = $this->hoersaal_model->get_sperrplatzcheck($page);
      $sperrplaetze = $this->hoersaal_model->get_sperrplatz($page,$sperrplatzreihe,$sperrplatzcheck);
      $reihe = $this->hoersaal_model->get_reihe($page);

      $revsperrplaetze = $this->hoersaal_model->get_revsperrplatz($page); // sonst wird nicht richtig gezählt, rev nur relevant für count

      //hoersaalübersicht updaten, wenn sperrplatz vorhanden
      $hoersaalID = [$_POST["hoersaalID"]];
      if(!empty($_POST["checkbox"])){ //checkbox ist das InputFeld für Sperrplätze
        $this->hoersaal_model->updateSperrplatz($hoersaalID);
      }

      $sperrplatzcheck = $this->hoersaal_model->get_sperrplatzCheck($page);
      $plaetze=$this->countPlaetze($platzAnzahl, $sperrplatzcheck, $sperrplatzreihe, $revsperrplaetze, $reihe);

      //Platzanzahl bei Klausur in hoersaalübersicht
      $hoersaalInfo = [$_POST["hoersaalID"], $plaetze];
      $this->hoersaal_model->insertIntoHoersaal($hoersaalInfo);

      $data['hoersaalID']=[$_POST["hoersaalID"]];
      $data['reihen'] =$reihe;
      $data['plaetze']=$plaetze;
      $this->load->view('templates/header');
      $this->load->view('hoersaele/success', $data);
      $this->load->view('templates/footer');
    }


    //AJAX
    public function reihen(){
      $q = $_REQUEST['q']; //Query für Eingabe
      $reihen = ""; //initialisiert String

        for($i=0; $q>$i;$i++){ //Ausgabe von Formvorlage entsprechend eingegebener Zahl
          $reihen = $reihen . //name="anzahlPlaetze.$i um für jede Reihe einen individuellen Namen zu haben"
          '<div class="form-group">
              <label for="anzahlPlaetze">Reihe '. ($i+1) .'</label>
              <input type="anzahlPlaetze" class="form-control" name="anzahlPlaetze'.$i.'" placeholder="Bitte Anzahl der Plätze eingeben">
            </div>';
        }
      echo $reihen; //Output
    }
    //AJAX
    public function sperrplaetze(){
      $q = $_REQUEST['q']; //Query für Eingabe
      $sperrplaetze = ""; //initialisiert String

        for($i=0; $q>$i;$i++){ //Ausgabe von Formvorlage entsprechend eingegebener Zahl
          $sperrplaetze = $sperrplaetze . //name="anzahlPlaetze.$i um für jede Reihe einen individuellen Namen zu haben"
          '<h2>Sperrplatz '.($i+1).'</h1>
          <br>
          <div class="form-group">
              <label for="sperrplatzreihe">Reihe</label>
              <input type="sperrplatzreihe" class="form-control" name="sperrplatzreihe'.$i.'" placeholder="Bitte Reihe eingeben">
            </div>
            <div class="form-group">
                <label for="sperrplatznummer">Platznummer</label>
                <input type="sperrplatznummer" class="form-control" name="sperrplatznummer'.$i.'" placeholder="Bitte Platznummer eingeben">
              </div>
              <br>';
        }
      echo $sperrplaetze; //Output
    }

    public function countPlaetze($platzAnzahl, $sperrplatzcheck, $sperrplatzreihe, $sperrplaetze, $reihe){
      $plaetze=0;
      $reiheLength = count($reihe);

      for($i=0;$i<$reiheLength;$i++){
        /* Wenn ungerade reihenanzahl,dann: */
        if($reiheLength%2!=0){
          /*1. Reihe und jede gerade */
        if($i==($reiheLength) || $i%2==0){
          for($j=0;$j<$platzAnzahl[$i];$j++){
            /* Den ersten Platz jeder Reihe, ab da jeden 3. besetzen */
              if($j==0 || $j%3==0){
                  $plaetze++;
              }
            }
          }
        }
        // Der selbe Algorithmus nochmal nur für gerade Reihenanzahl
        else{
          /*Wenn Counter i gleich Länge des Arrays besetzen! */
        if($i==($reiheLength) || $i%2!=0){
          for($j=0;$j<$platzAnzahl[$i];$j++){
            /* Den ersten Platz jeder Reihe, ab da jeden 3. besetzen */
              if($j==0 || $j%3==0){
                  $plaetze++;
              }
            }
          }
        }
      }
      //Sperrplatzüberprüfung
      if($sperrplatzcheck[0]==1){
      for($i=0;$i<(count($sperrplaetze));$i++){
        //ungerade Reihenanzahl
      if($reiheLength%2!=0){
        if($sperrplatzreihe[$i]==$reiheLength || $sperrplatzreihe[$i]%2==1){
          if($sperrplaetze[$i]==0 || $sperrplaetze[$i]%3==1)
        $plaetze--;
        }
      }
      //gerade Reihenanzahl
      if($reiheLength%2==0){
        if($sperrplatzreihe[$i]==$reiheLength || $sperrplatzreihe[$i]%2!=0){
          if($sperrplaetze[$i]==0 || $sperrplaetze[$i]%3==1)
        $plaetze--;
        }
      }
    }
    return $plaetze;
  }
    else{
              return $plaetze;
            }
    }


    //matrnr werden als array erzeugt
    public function first_column(){
      $x = [];
      $start_row = 2;
      $i = 1;
      $handle = fopen('uploads/liste.csv', 'r');
      while(($row = fgetcsv($handle, 1000, ';')) !== FALSE) {
        if($i >= $start_row) {
          array_push($x, $row[0]);
        }
        $i++;
      }
      fclose($handle);
      return $x;	//print_r ($x);

    }

    //Spalte Nachname
    public function nachname_column(){
      $x = [];

      $start_row = 2;
      $i = 1;
      $handle = fopen('uploads/liste.csv', 'r');
      while(($row = fgetcsv($handle, 1000, ';')) !== FALSE) {
        if($i >= $start_row) {
          array_push($x, utf8_encode($row[2]));
        }
        $i++;
      }
      fclose($handle);
      return $x;

    }
    //Spalte Vorname
    public function vorname_column(){
      $x = [];

      $start_row = 2;
      $i = 1;
      $handle = fopen('uploads/liste.csv', 'r');
      while(($row = fgetcsv($handle, 1000, ';')) !== FALSE) {
        if($i >= $start_row) {
          array_push($x, utf8_encode($row[3]));
        }
        $i++;
      }
      fclose($handle);
      return $x;

    }

}?>
