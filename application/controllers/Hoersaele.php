<?php
  class Hoersaele extends CI_Controller{
    public function index(){ //Raumnummer aus Auswahl wird übergeben

        $this->load->view('templates/hoersaalheader');

        $data['hoersaalID'] = $this->hoersaal_model->get_hoersaalID(); //liefert die HoersaalID Spalte aus hoersaal
        $this->load->view('hoersaele/index', $data);
        
        $this->load->view('templates/footer');

    }

    public function view($page){ //Raumnummer aus Auswahl wird übergeben
      //Gibt Spalte 'reihe' als Array aus hoersaal aus
      $data['platzAnzahl'] = $this->hoersaal_model->get_platzAnzahl($page); //Aufruf entsprechend übergebener Raumnummer
      $data['reihe'] = $this->hoersaal_model->get_reihe($page);
      $data['raum'] = $page;
      //Überprüfung ob Zugriff auf Datenbank erfolgreich, nicht formatiert, deswegen hässlicher Output
      print_r($data['platzAnzahl']);

      //Header&Footer sowie entsprechender hoersaele view
        $this->load->view('templates/hoersaalheader');
        $this->load->view('hoersaele/platzvergabe', $data);
        $this->load->view('templates/footer');

  }
  //Hörsaal-Erstellung
    public function create(){
      $raumInfo = [$_POST["hoersaalID"], $_POST["reihen"],$_POST["anzahlPlaetze"]]; //Variablen aus der Form in einen Array speichern

      $data['raumInfo'] = $this->hoersaal_model->createDatabase($raumInfo);
      $this->load->view('hoersaele/success', $data);
    }

}?>
