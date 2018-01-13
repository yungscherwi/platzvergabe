<?php
  class Pages extends CI_Controller{
    public function view($page ='home'){
      //Wenn Seite nicht existiert->404
      if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
        show_404();
      }
      //ucfirst-> UpperCasefirst, also erster Buchstabe groß
      $data['title'] = ucfirst($page);

        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');

    }
  }?>
