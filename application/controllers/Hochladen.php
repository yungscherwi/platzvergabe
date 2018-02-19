<?php
  class Hochladen extends CI_Controller{

            public function __construct()
            {
                    parent::__construct();
                    $this->load->helper(array('form', 'url'));
            }


            public function index()
            {
              $this->load->view('templates/hochladenheader');
              $this->load->view('hochladen/index', array('error' => ' ' ));
              $this->load->view('templates/footer');
            }

            public function view($page ='index'){
              //Wenn Seite nicht existiert->404

              if(!file_exists(APPPATH.'views/hochladen/hoersaele/'.$page.'.php')){
                show_404();
              }

              $data['title'] = ucfirst($page);
              $this->load->view('templates/hoersaalheader');
              $this->load->view('hoersaele/index'.$page);
              $this->load->view('templates/footer');

          }
        }?>
