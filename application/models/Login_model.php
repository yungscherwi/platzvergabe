<?php  
class Login_model extends CI_Model  
{  
    function can_login($username, $password)  
    {   
  
        $this->db->where('benutzername', $username);           //abgleich von eingegebenen Benutzerdaten mit den 
                                                               //Benutzerdaten in der Datenbank
        $query = $this->db->get('benutzer');                   //SELECT * FROM benutzer WHERE username = '$username'  
        if($query->num_rows() > 0)                             //anzahl der reihen größer 0?, dann... 
        {  
            $user_row = $query -> row();                        //$user_row = Benutzerdaten aus DB
            
            return password_verify($password, $user_row ->passwort);  //return true wenn eingegebenes PW = hashed PW aus DB
        }  
        else                                                          //...sonst...
        {  
            return false;                                             //...return false
        }
    }  
}