<?php  
class Login_model extends CI_Model  
{  
    function can_login($username, $password)  
    {   
  
        $this->db->where('benutzername', $username);           //abgleich von eingegebenen Benutzerdaten mit den 
                                                               //Benutzerdaten in der Datenbank
        $query = $this->db->get('benutzer');                   //SELECT * FROM users WHERE username = '$username' AND password = '$password'  
        if($query->num_rows() > 0)                              
        {  
            $user_row = $query -> row();
            
            return password_verify($password, $user_row ->passwort);  
        }  
        else  
        {  
            return false;       
        }
    }  
}