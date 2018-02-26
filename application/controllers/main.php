 <?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class Main extends CI_Controller {  
      //functions  
      function login()  
      {  
           //http://localhost/platzvergabe/main/login   
           $this->load->view('templates/platzvergabeheader');                           
           $this->load->view("pages/login");  
           $this->load->view('templates/footer');
      }  
      function login_validation()  
      {   
           $this->form_validation->set_rules('username', 'Username', 'required');  
           $this->form_validation->set_rules('password', 'Password', 'required');  
           if($this->form_validation->run())  
           {  
                //true  
                $username = $this->input->post('username');  
                $password = $this->input->post('password');  
                //model function  
                $this->load->model('main_model');  
                if($this->main_model->can_login($username, $password))  
                {  
                     $session_data = array(  
                          'username'     =>     $username  
                     );  
                     $this->session->set_userdata($session_data);  
                     redirect(base_url() . 'main/enter');  
                }  
                else  
                {  
                     $this->session->set_flashdata('error', 'Invalid Username and Password');  
                     redirect(base_url() . 'main/login');  
                }  
           }  
           else  
           {  
                //false  
                $this->login();  
           }  
      }  
      function enter(){  
           if($this->session->userdata('username') != '')  
           {    echo "<script>
                    alert('There are no fields to generate a report');                 
                    window.location.href='view';
                    </script>";

           }  
           else  
           {  
                redirect(base_url() . 'main/login');  
           }  
      }  
      function logout()  
      {  
           $this->session->unset_userdata('username');  
           redirect(base_url() . 'main/login');  
      }  
 
      
    public function view($page ='home'){
      //Wenn Seite nicht existiert->404
      if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
        show_404();
      }
      //ucfirst-> UpperCasefirst, also erster Buchstabe groß
        $data['title'] = ucfirst($page);

        $this->load->view('templates/header');
        //    $this->load->view('templates/navbar');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
    }
  }
      
 