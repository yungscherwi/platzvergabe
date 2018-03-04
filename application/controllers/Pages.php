<?php
  class Pages extends CI_Controller{
    public function view($page ='home'){
      //Wenn Seite nicht existiert->404
      if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
        show_404();
      }
        $data['hoersaalID'] = $this->hoersaal_model->get_hoersaalID(); //liefert die HoersaalID Spalte aus hoersaal
        $data['plaetze'] = $this->hoersaal_model->get_allPlaetze(); //alle plätze als array
        $data['matrikelnummern'] = $this->first_column();
        $data['nachnamen'] = $this->nachname_column();
        $data['vornamen'] = $this->vorname_column();
        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
    }
//Spalte Matrikelnummer
    public function first_column(){
      $x = [];
      $start_row = 2;
      $i = 1;
     $handle = fopen('uploads/liste_' . $_SESSION['username'] . '_' . date('Y_m_d') . '.csv', 'r');
      while(($row = fgetcsv($handle, 1000, ';')) !== FALSE) {
        if($i >= $start_row) {
          array_push($x, $row[0]);
        }
        $i++;
      }
      fclose($handle);
      return $x;
    }
//Spalte Nachname
public function nachname_column(){
  $x = [];
  $start_row = 2;
  $i = 1;
  $handle = fopen('uploads/liste_' . $_SESSION['username'] . '_' . date('Y_m_d') . '.csv', 'r');
  while(($row = fgetcsv($handle, 1000, ';')) !== FALSE) {
    if($i >= $start_row) {
      array_push($x, $row[2]);
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
  $handle = fopen('uploads/liste_' . $_SESSION['username'] . '_' . date('Y_m_d') . '.csv', 'r');
  while(($row = fgetcsv($handle, 1000, ';')) !== FALSE) {
    if($i >= $start_row) {
      array_push($x, $row[3]);
    }
    $i++;
  }
  fclose($handle);
  return $x;
}
    public function hoersaal_delete(){
      $hoersaalID = $_POST["hoersaal"];
      $this->hoersaal_model->delete_hoersaal($hoersaalID);
      $data['hoersaal'] = $hoersaalID;
      $this->load->view('templates/header');
      $this->load->view('pages/deleted', $data);
      $this->load->view('templates/footer');
    }
  }?>