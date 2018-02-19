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

  public function createDatabase($raumInfo){
    $this->load->dbforge();

    $fields = array( //Erstellen der Spalten
      'reihe' => array(
        'type' => 'int'
        , 'constraint' => 11 //maximal 11 Zeichen
        , 'auto_increment' => true
      )
      ,'platzAnzahl' => array(
        'type' => 'int'
        , 'constraint' => 11
      )
      ,'hoersaalID' =>array(
        'type' => 'varchar'
        , 'constraint' => 255
      )
    );

    $this->dbforge->add_field($fields);
    $this->dbforge->add_key('reihe', true); //Primärschlüssel
    $this->dbforge->create_table($raumInfo[0]); //Name = erste Stelle vom Array
    //Datenbank ist erstellt, jetzt Insert
    for($i=0; $raumInfo[1]>$i; $i++){ //je nach anzahl der reihen loopen
    $infos = array(
      'platzAnzahl' => $raumInfo [2],
      'hoersaalID' => $raumInfo[0] //hoersaalID immer identisch
    );
    $this->db->insert($raumInfo[0], $infos);
    }
    //Hörsaal in Übersichtstabelle einfügen
    $data = array(
      'hoersaalID' => $raumInfo[0]
    );
    $this->db->insert('hoersaal', $data);
    return ($raumInfo);

  }

  public function get_hoersaalID(){
    $sql = "SELECT group_concat(hoersaalID separator ',') as 'hoersaalID' FROM `hoersaal`"; // geht nur mit ` statt ' komischerweise
    $query = $this->db->query($sql);
    $array1 = $query->row_array();
    $arr = explode(',',$array1['hoersaalID']);

    return($arr);
  }
} ?>
