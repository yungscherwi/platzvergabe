<?php
class Hoersaal_model extends CI_Model{
  public function __construct(){
    $this->load->database();
  }


  //Checkt ob Sperrplätze vorhanden im jeweiligen Raum

  public function get_sperrplatzCheck($raum){
    $sql = "SELECT sperrplaetze FROM hoersaal WHERE hoersaalID = '$raum'"; //SQL-Abfrage für Platzanzahl
    $query = $this->db->query($sql);
    $array1 = $query->row_array();

    $arr= implode($array1); //implode macht Array zu String
    return ($arr);
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

  public function get_hoersaalID(){
    $sql = "SELECT group_concat(hoersaalID separator ',') as 'hoersaalID' FROM `hoersaal`"; // geht nur mit ` statt ' komischerweise
    $query = $this->db->query($sql);
    $array1 = $query->row_array();
    $arr = explode(',',$array1['hoersaalID']);

    return($arr);
  }

  public function get_sperrplatz($raum){
    $sql = "SELECT group_concat(sperrplatz separator ',') as 'sperrplatz' FROM `sperrplaetze` WHERE hoersaalID = '".$raum."'";
    $query = $this->db->query($sql);
    $array1 = $query->row_array();
    $arr = explode(',',$array1['sperrplatz']);

    return ($arr);
  }

  public function get_sperrplatzreihe($raum){
    $sql = "SELECT group_concat(sperrplatzreihe separator ',') as 'sperrplatzreihe' FROM `sperrplaetze` WHERE hoersaalID = '".$raum."'";
    $query = $this->db->query($sql);
    $array1 = $query->row_array();
    $arr = explode(',',$array1['sperrplatzreihe']);

    $revarr = array_reverse($arr); //für richtige Ausrichtung des hörsaals
    return ($revarr);
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
    $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (hoersaalID) REFERENCES hoersaal(hoersaalID)'); //Fremdschlüssel
    $this->dbforge->create_table($raumInfo[0]); //Name = erste Stelle vom Array
//hoersaalID wird eingefügt in die Tabelle
    $data = array(
      'hoersaalID' => $raumInfo[0]
    );
    $this->db->insert('hoersaal', $data);
  }

    //Datenbank ist erstellt, jetzt Insert
    public function insertIntoDatabase($insertInfo){
    $infos = array(
      'platzAnzahl' => $insertInfo [1],
      'hoersaalID' => $insertInfo[0] //MUSS NOCH ALS FREMDSCHLÜSSEL DEKLARIERT WERDEN
    );
    $this->db->insert($insertInfo[0], $infos);

    return ($insertInfo);

  }

    public function insertIntoHoersaal($hoersaalInfo){
      //Anzahl der Plaetze wird in Tabelle 'hoersaal' ergänzt
      $sql = "UPDATE hoersaal SET plaetze = ".$hoersaalInfo[1]." WHERE hoersaalID = '".$hoersaalInfo[0]."'";
      $query = $this->db->query($sql);

      return;

    }

} ?>
