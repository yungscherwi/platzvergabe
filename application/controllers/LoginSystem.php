<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 
class LoginSystem extends CI_Controller {  
      
    function login()  
    {  
        //http://localhost/platzvergabe/loginsystem/login   
        $this->load->view('templates/platzvergabeheader');                           
        $this->load->view("pages/login");  
        $this->load->view('templates/footer');
    }  
    function login_validation()                                                              
    {   
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');  //trim entfernt leerzeichen vor und nach dem string
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');  //xss_clean liefert xss filter
        if($this->form_validation->run())  
        {  
            //username und password werden dem model geliefert
            $username = $this->input->post('username');  
            $password = $this->input->post('password');  
            //model function  
            $this->load->model('Login_model');  
            if($this->Login_model->can_login($username, $password))  
            {  
                //session wird für den Benutzer angelegt
                $session_data = array(                              
                'username'    =>    $username  
                );  
                $this->session->set_userdata($session_data);  
                redirect(base_url() . 'LoginSystem/enter');  
            }  
            else  
            {  
                $this->session->set_flashdata('error', 'Invalid Username and Password');  
                redirect(base_url() . 'LoginSystem/login');  
            }  
        }  
        else  
        {  
        //false  
        $this->login();  
        }  
    }  
    function enter(){  
        if($this->session->userdata('username') != '')                    //falls aktive session vorhanden, weiterleitung auf Home-Seite
        {    
            echo "<script>window.location.href='view';</script>";
        }  
        else  
        {  
            redirect(base_url() . 'LoginSystem/login');  
        }  
    }  
    function logout()  
    {  
        $this->session->unset_userdata('username');                        //aktive Session wird beendet und zurückgesetzt
        redirect(base_url() . 'LoginSystem/login');                        //rücksprung auf die login seite
    }  
  
    public function view($page ='home'){
        //Wenn Seite nicht existiert->404
        if(!file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            show_404();
        }
        //ucfirst-> UpperCasefirst, also erster Buchstabe groß
        $data['title'] = ucfirst($page);
        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
    }
}
      
 