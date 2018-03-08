<?php
  class Pages extends CI_Controller{
    public function view($page ='home'){
      
        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){                  //Wenn Seite nicht existiert->404
            show_404();
        }
        $data['hoersaalID'] = $this->hoersaal_model->get_hoersaalID();          //liefert die HoersaalID Spalte aus hoersaal
        $data['plaetze'] = $this->hoersaal_model->get_allPlaetze();             //alle plätze als array
        $this->load->view('templates/header');                                  
        $this->load->view('pages/'.$page, $data);                               
        $this->load->view('templates/footer');

    }

    public function hoersaal_delete(){
        $hoersaalID = $_POST["hoersaal"];                                       //$hoersaalID = ausgewählter hörsaal 
        $this->hoersaal_model->delete_hoersaal($hoersaalID);                    //aufruf der delete_hoersaal funktion mit der $hoersaalID
        $data['hoersaal'] = $hoersaalID;                                        //hoersaal tabelle updaten
        $this->load->view('templates/header');                                  //laden des headers...
        $this->load->view('pages/deleted', $data);                              //...der hoersaal deleted seite...
        $this->load->view('templates/footer');                                  //... des footers
    }
  }?>

