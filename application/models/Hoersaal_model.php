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

    $revarr = array_reverse($arr); //für richtige Ausrichtung des hörsaals

    return($revarr);
  }
  //Ausgabe von Spalte 'reihe' in einem Array
  public function get_reihe($raum){
    $sql = "SELECT group_concat(reihe separator ',') as 'reihe' FROM $raum";
    $query = $this->db->query($sql);
    $array1 = $query->row_array();
    $arr = explode(',',$array1['reihe']);

    $revarr = array_reverse($arr); //für richtige Ausrichtung des hörsaals
    return ($revarr);
  }

//fragt die Anzahl der Plätze ab
  public function get_plaetze($raum){
    $sql = "SELECT plaetze FROM hoersaal WHERE hoersaalID = '$raum'"; //SQL-Abfrage für Platzanzahl
    $query = $this->db->query($sql);
    $array1 = $query->row_array();

    $arr= implode($array1); //implode macht Array zu String
    return ($arr);
  }

  public function get_allPlaetze(){
    $sql = "SELECT group_concat(plaetze separator ',') as 'plaetze' FROM `hoersaal`"; // geht nur mit ` statt ' komischerweise
    $query = $this->db->query($sql);
    $array1 = $query->row_array();
    $arr = explode(',',$array1['plaetze']);

    return($arr);

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
  }

    //Datenbank ist erstellt, jetzt Insert
    public function insertIntoDatabase($insertInfo){
    $infos = array(
      'platzAnzahl' => $insertInfo [1],
      'hoersaalID' => $insertInfo[0] //hoersaalID immer identisch
    );
    $this->db->insert($insertInfo[0], $infos);

    return ($insertInfo);

  }

    public function insertIntoHoersaal($hoersaalInfo){
      //Hörsaal in Übersichtstabelle einfügen
      $data = array(
        'hoersaalID' => $hoersaalInfo[0],
        'plaetze' =>$hoersaalInfo[1]
      );
      $this->db->insert('hoersaal', $data);
    }

  public function get_hoersaalID(){
    $sql = "SELECT group_concat(hoersaalID separator ',') as 'hoersaalID' FROM `hoersaal`"; // geht nur mit ` statt ' komischerweise
    $query = $this->db->query($sql);
    $array1 = $query->row_array();
    $arr = explode(',',$array1['hoersaalID']);

    return($arr);
  }
} ?>
