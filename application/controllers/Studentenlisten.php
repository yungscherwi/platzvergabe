<?php
  class Studentenlisten extends CI_Controller{
    public function index(){
      //Definiert Titel
      $data['title'] = 'Studentenlisten';
      //studentenlisten gleich den Daten aus studentenliste_model
      $data['studentenlisten'] = $this->studentenliste_model->get_studentenlisten();
      //Überprüfung ob Zugriff auf Datenbank erfolgreich, nicht formatiert, deswegen hässlicher Output
      print_r($data['studentenlisten']);

      //Header&Footer sowie entsprechender studentenlisten view
        $this->load->view('templates/header');
        $this->load->view('studentenlisten/index', $data);
        $this->load->view('templates/footer');

    }
  }?>
