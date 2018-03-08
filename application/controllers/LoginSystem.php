<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 
class LoginSystem extends CI_Controller {  
      
    function login()  
    {  
        //http://localhost/platzvergabe/loginsystem/login   
        $this->load->view('templates/platzvergabeheader');                                     //laden des headers...
        $this->load->view("pages/login");                                                      //...der Login Seite...
        $this->load->view('templates/footer');                                                 //...und des footers
    }  
    function login_validation()                                                              
    {                                                                                          //CI_framework library funktion 
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');  //trim entfernt leerzeichen vor und nach dem string
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');  //xss_clean liefert xss filter
        if($this->form_validation->run())  
         
        {  
            
           
            $username = $this->input->post('username');                                        //username = eingegebenen username aus view
            $password = $this->input->post('password');                                        //password = eingegebenen password aus view
 

             
            $this->load->model('Login_model');                                                 //login_model wird geladen  
            if($this->Login_model->can_login($username, $password))                            //username und password werden dem model geliefert  
            {  
                                                                                               //session wird für den Benutzer angelegt
                $session_data = array(                              
                'username'    =>    $username  
                );  
                $this->session->set_userdata($session_data);  
                redirect(base_url() . 'LoginSystem/enter');                                    //aufrufen der "enter" funktion
            }  
            else                                                                               //...sonst...
            {  
                $this->session->set_flashdata('error', 'Invalid Username and Password');       //...Fehlermeldung anzeigen
                redirect(base_url() . 'LoginSystem/login');                                    //...und zurück zum Login
            }  
        }  
        else                                                                                   //...sonst... 
        {  
        //false  
        $this->login();                                                                        //...zurück zum Login
        }  
    }  
    function enter(){  
        if($this->session->userdata('username') != '')                     //falls aktive session vorhanden...
        {    
            echo "<script>window.location.href='view';</script>";          //...weiterleitung auf Home-Seite
        }  
        else  
        {  
            redirect(base_url() . 'LoginSystem/login');                    //...sonst zurück zur Login Seite
        }  
    }  
    function logout()  
    {  
        $this->session->unset_userdata('username');                        //aktive Session wird beendet und zurückgesetzt
        redirect(base_url() . 'LoginSystem/login');                        //rücksprung auf die login seite
    }  
  
    public function view($page ='home'){
       
        if(!file_exists(APPPATH.'views/pages/'.$page.'.php'))               //Wenn Seite nicht existiert->404
        {
            show_404();
        }
        
        $data['title'] = ucfirst($page);                                    //ucfirst-> UpperCasefirst, also Anfangsbuchstabe groß
        $this->load->view('templates/header');                              //laden des headers...
        $this->load->view('pages/'.$page, $data);                           //...der Startseite...
        $this->load->view('templates/footer');                              //...und dem footer
    }
}
      
 