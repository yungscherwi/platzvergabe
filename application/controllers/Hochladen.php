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


            public function do_upload()
            {
                    $config['upload_path']          = './uploads/';
                    $config['allowed_types']        = 'csv';

                    $this->load->library('upload', $config);

                    if ( ! $this->upload->do_upload('userfile'))
                    {
                            $error = array('error' => $this->upload->display_errors());

                            $this->load->view('hochladen', $error);
                    }
                    else
                    {
                            $data = array('upload_data' => $this->upload->data());

                            $this->load->view('hochladen/upload_success', $data);
                    }
            }
    }
    ?>
