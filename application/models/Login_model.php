<?php  
class Login_model extends CI_Model  
{  
    function can_login($username, $password)  
    {  
        $this->db->where('username', $username);           //abgleich von eingegebenen Benutzerdaten mit den 
        $this->db->where('password', $password);           //Benutzerdaten in der Datenbank
        $query = $this->db->get('users');
                                                           //SELECT * FROM users WHERE username = '$username' AND password = '$password'  
        if($query->num_rows() > 0)  
        {  
            return true;  
        }  
        else  
        {  
            return false;       
        }  
    }  
}