<?php
class Studentenliste_model extends CI_Model{
  public function __construct(){
    $this->load->database();
  }
//Zugriff auf Datenbank mit get_studentenlisten
  public function get_studentenlisten($Nachname = FALSE){
    if($Nachname === FALSE){        //Wenn Nachname leer(also Liste zu Ende)-> Output von Array
      $query = $this->db->get('studentenlisten');
      return $query->result_array();
      }

    $query = $this->db->get_where('studentenlisten', array('Nachname' => $Nachname));
    return $query->row_array();

  }

} ?>
