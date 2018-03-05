<?php
  class Hochladen extends CI_Controller{
            public function __construct() {
              parent::__construct();
              $this->load->helper(array('url','html','form')); 
           }
            public function index()
            {
              $this->load->view('templates/header');
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
              $this->load->view('templates/header');
              $this->load->view('hoersaele/index'.$page);
              $this->load->view('templates/footer');
          }
          public function do_upload()
          {
                  $config['upload_path']          = './uploads/';
                  $config['allowed_types']        = 'csv';
                  $config['max_size']             = '10000'; /* erlaubte Größe: 10 MB*/
                  $this->load->library('upload', $config);
                  if ( ! $this->upload->do_upload('userfile'))
                  {
                          $error = array('error' => $this->upload->display_errors());
                          $this->load->view('templates/header');
                          $this->load->view('hochladen/index', $error);
                          $this->load->view('templates/footer');
                  }
                  else
                  {
                          $data = array('upload_data' => $this->upload->data());
                          $this->load->view('templates/header');
                          $this->load->view('hochladen/upload_success', $data);
                          $this->load->view('templates/footer');
                  }
          }
          public function upload() {
            if (!empty($_FILES)) {
              $tempFile = $_FILES['file']['tmp_name'];
              $fileName = 'liste_' . $_SESSION['username'] . '_' . date('Y_m_d') . '.csv';
              $targetPath = getcwd() . '/uploads/';
              $targetFile = $targetPath . $fileName;
              move_uploaded_file($tempFile, $targetFile);
            }
          }
}?>