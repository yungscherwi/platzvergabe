<?php
  class Pages extends CI_Controller{
    public function view($page ='home'){
      //Wenn Seite nicht existiert->404
      if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
        show_404();
      }
        $data['hoersaalID'] = $this->hoersaal_model->get_hoersaalID(); //liefert die HoersaalID Spalte aus hoersaal
        $data['plaetze'] = $this->hoersaal_model->get_allPlaetze(); //alle plätze als array

      /*  $data['matrikelnummern'] = $this->first_column();   //variablen hier definieren dann geht auch kontrolliste 
        $data['nachnamen'] = $this->nachname_column();      //via dem aufruf window.open('kontrollliste'); 
        $data['vornamen'] = $this->vorname_column();        //sonst nur  window.open('hoersaele/kontrollliste/'+selectedHs); */
        $this->load->view('templates/header');
         $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');

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

