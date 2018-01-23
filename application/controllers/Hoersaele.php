<?php
  class Hoersaele extends CI_Controller{
      public function view($page ='index'){
        //Wenn Seite nicht existiert->404
        if(!file_exists(APPPATH.'views/hoersaele/'.$page.'.php')){
          show_404();
        }


        $data['title'] = ucfirst($page);

        $this->load->view('hoersaele/'.$page, $data);

    }
  }?>
