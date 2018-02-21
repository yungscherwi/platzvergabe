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

              //um nur passende hörsäle auszuwählen
              $data['hoersaalID'] = $this->hoersaal_model->get_hoersaalID(); //liefert die HoersaalID Spalte aus hoersaal
              $data['plaetze'] = $this->hoersaal_model->get_allPlaetze(); //alle plätze als array

              $this->load->view('hochladen/index', $data);
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

            public function upload() {
              if (!empty($_FILES)) {
                $tempFile = $_FILES['file']['tmp_name'];
                $fileName = 'test.csv';
                $targetPath = getcwd() . 'uploads/';
                $targetFile = $targetPath . $fileName;
                move_uploaded_file($tempFile, $targetFile);
              }
            }
        }?>
