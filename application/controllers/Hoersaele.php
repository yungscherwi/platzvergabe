<?php
  class Hoersaele extends CI_Controller{
    //Hörsaal-Erstellen
    public function index(){

        $this->load->view('templates/hoersaalheader');

        $data['hoersaalID'] = $this->hoersaal_model->get_hoersaalID(); //liefert die HoersaalID Spalte aus hoersaal
        $this->load->view('hoersaele/index', $data);

        $this->load->view('templates/footer');

    }
    //Hörsaalaufruf
    public function view($page){ //Raumnummer aus Auswahl wird übergeben
      //Gibt Spalte 'reihe' als Array aus hoersaal aus
      $data['platzAnzahl'] = $this->hoersaal_model->get_platzAnzahl($page); //Aufruf entsprechend übergebener Raumnummer
      $data['reihe'] = $this->hoersaal_model->get_reihe($page);
      $data['plaetze'] = $this->hoersaal_model->get_plaetze($page);
      $data['raum'] = $page;
      $data['MartrNr'] = $this->first_column();
      //wenn mehr Plätze als Studenten, dann führe aus:
      if($data['plaetze']>=count($data['MartrNr'])){
        $this->load->view('templates/platzvergabeheader');
        $this->load->view('hoersaele/platzvergabe', $data);
        $this->load->view('templates/footer');
      }
      else{
        print('Hörsaal zu klein');
      }
  }
  //Hörsaal-Erstellung Funktion
    public function create(){
      $raumInfo = [$_POST["hoersaalID"]]; //Variable aus der Form in einen Array speichern
      $data['raumInfo'] = $this->hoersaal_model->createDatabase($raumInfo);

      $i=0; //counter variable für anzahlPlaetze
      while(!empty($_POST["anzahlPlaetze".$i.""])){ //Solange wiederholen, bis anzahlPlaetze nicht vorhanden
        $insertInfo =  [$_POST["hoersaalID"],$_POST["anzahlPlaetze".$i.""]]; //Input für insert
        $i++;
        $data['insertInfo'] = $this->hoersaal_model->insertIntoDatabase($insertInfo);
      }

      //Variablen für Platzberechnung
      $page = implode([$_POST["hoersaalID"]]);
      $platzAnzahl = $this->hoersaal_model->get_platzAnzahl($page); //Aufruf entsprechend übergebener Raumnummer
      $reiheLength = $i;
      $plaetze=$this->countPlaetze($platzAnzahl, $reiheLength);

      $hoersaalInfo = [$_POST["hoersaalID"], $plaetze];
      $this->hoersaal_model->insertIntoHoersaal($hoersaalInfo);
      //Einfügen von Plätze und HoersaalID
      $this->load->view('templates/hoersaalheader');
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

    public function countPlaetze($platzAnzahl, $reiheLength){
      $plaetze=0;
      for($i=0;$i<$reiheLength;$i++){
        /* Wenn ungerade reihenanzahl,dann: */
        if($reiheLength%2!=0){
          /*Wenn Counter i gleich Länge des Arrays besetzen! */
        if($i==($reiheLength) || $i%2==0){
          for($j=0;$j<$platzAnzahl[$i];$j++){
            /* Den ersten Platz jeder Reihe, ab da jeden 3. besetzen */
              if($j==0 || $j%3==0){
                $plaetze++;
              }}}}
        // Das selbe nochmal nur für gerade Reihenanzahl
        else{
          /*Wenn Counter i gleich Länge des Arrays besetzen! */
        if($i==($reiheLength) || $i%2!=0){
          for($j=0;$j<$platzAnzahl[$i];$j++){
            /* Den ersten Platz jeder Reihe, ab da jeden 3. besetzen */
              if($j==0 || $j%3==0){
                  $plaetze++;
              }}}}}
              return $plaetze;
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

}?>
