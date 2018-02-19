<?php
class Hoersaal_model extends CI_Model{
  public function __construct(){
    $this->load->database();
  }
// Ausgabe von Spalte 'platzAnzahl' in einem Array
  public function get_platzAnzahl($raum){
    $sql = "SELECT group_concat(platzAnzahl separator ',') as 'platzAnzahl' FROM $raum";
    $query = $this->db->query($sql);
    $array1 = $query->row_array();
    $arr = explode(',',$array1['platzAnzahl']);

    return($arr);
  }
  //Ausgabe von Spalte 'reihe' in einem Array
  public function get_reihe($raum){
    $sql = "SELECT group_concat(reihe separator ',') as 'reihe' FROM $raum";
    $query = $this->db->query($sql);
    $array1 = $query->row_array();
    $arr = explode(',',$array1['reihe']);

    return ($arr);
  }

} ?>
