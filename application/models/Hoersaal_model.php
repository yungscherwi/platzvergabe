<?php
class Hoersaal_model extends CI_Model{
  public function __construct(){
    $this->load->database();
  }
  //Checkt ob Sperrplätze vorhanden im jeweiligen Raum
  public function get_sperrplatzCheck($raum){
    $sql = "SELECT sperrplaetze FROM hoersaaluebersicht WHERE hoersaalID = '$raum'"; //SQL-Abfrage für Platzanzahl
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
    $sql = "SELECT plaetze FROM hoersaaluebersicht WHERE hoersaalID = '$raum'"; //SQL-Abfrage für Platzanzahl
    $query = $this->db->query($sql);
    $array1 = $query->row_array();
    $arr= implode($array1); //implode macht Array zu String
    return ($arr);
  }
  public function get_allPlaetze(){
    $sql = "SELECT group_concat(plaetze separator ',') as 'plaetze' FROM `hoersaaluebersicht`"; // geht nur mit ` statt ' komischerweise
    $query = $this->db->query($sql);
    $array1 = $query->row_array();
    $arr = explode(',',$array1['plaetze']);
    return($arr);
  }
  public function get_hoersaalID(){
    $sql = "SELECT group_concat(hoersaalID separator ',') as 'hoersaalID' FROM `hoersaaluebersicht`"; // geht nur mit ` statt ' komischerweise
    $query = $this->db->query($sql);
    $array1 = $query->row_array();
    $arr = explode(',',$array1['hoersaalID']);
    return($arr);
  }
  public function get_sperrplatz($raum,$sperrplatzreihe,$sperrplatzcheck){
    if($sperrplatzcheck==1){
    $sql = "SELECT group_concat(sperrplatz separator ',') as 'sperrplatz' FROM `sperrplaetze` WHERE hoersaalID = '".$raum."'";
    $query = $this->db->query($sql);
    $array1 = $query->row_array();
    $arr = explode(',',$array1['sperrplatz']);
    $revarr = array_reverse($arr); //für richtige Ausrichtung des hörsaals
$zwischen=[];
$new=[];
$final=[];
for($i=0;$i<count($revarr);$i++){
	if(!empty($revarr[$i+1])){
	if($sperrplatzreihe[$i]==$sperrplatzreihe[$i+1]){
		array_push($zwischen,$revarr[$i]);
	}
	else{
		array_push($zwischen,$revarr[$i]);
		sort($zwischen);
		array_push($final,$zwischen);
		$zwischen=[];
	   }
	}
	else{
		if($sperrplatzreihe[$i]==$sperrplatzreihe[$i-1]){
			array_push($zwischen,$revarr[$i]);
			sort($zwischen);
			array_push($final,$zwischen);
		}
		else{
		sort($zwischen);
		array_push($final,$zwischen);
		$zwischen=[];
		array_push($zwischen,$revarr[$i]);
		array_push($final,$zwischen);
	   }
   }
}
  $result = call_user_func_array('array_merge', $final);
    return ($result);
  }
  else{
    return;
    }
}
  public function get_revsperrplatz($raum){
    $sql = "SELECT group_concat(sperrplatz separator ',') as 'sperrplatz' FROM `sperrplaetze` WHERE hoersaalID = '".$raum."'";
    $query = $this->db->query($sql);
    $array1 = $query->row_array();
    $arr = explode(',',$array1['sperrplatz']);
    $revarr = array_reverse($arr); //für richtige Ausrichtung des hörsaals
    return ($revarr);
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
    $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (hoersaalID) REFERENCES hoersaaluebersicht(hoersaalID)'); //Fremdschlüssel
    $this->dbforge->create_table($raumInfo[0]); //Name = erste Stelle vom Array
    //hoersaalID wird eingefügt in die Tabelle
    $data = array(
      'hoersaalID' => $raumInfo[0]
    );
    $this->db->insert('hoersaaluebersicht', $data);
  }
    //Datenbank ist erstellt, jetzt Insert
    public function insertIntoDatabase($insertInfo){
    $infos = array(
      'platzAnzahl' => $insertInfo [1],
      'hoersaalID' => $insertInfo[0]
    );
    $this->db->insert($insertInfo[0], $infos);
    return ($insertInfo);
  }
    public function insertIntoHoersaal($hoersaalInfo){
      //Anzahl der Plaetze wird in Tabelle 'hoersaal' ergänzt
      $sql = "UPDATE hoersaaluebersicht SET plaetze = ".$hoersaalInfo[1]." WHERE hoersaalID = '".$hoersaalInfo[0]."'";
      $query = $this->db->query($sql);
      return;
    }
    public function updateSperrplatz($hoersaalInfo){
      //Sperrplätze auf 1 gesetzt, da vorhanden
      $sql = "UPDATE hoersaaluebersicht SET sperrplaetze = '1' WHERE hoersaalID = '".$hoersaalInfo[0]."'";
      $query = $this->db->query($sql);
      return;
    }
    public function insertIntoSperrplaetze($sperrplatzInfo){
      $infos = array(
        'hoersaalID' => $sperrplatzInfo[0],
        'sperrplatzreihe' => $sperrplatzInfo[1],
        'sperrplatz' => $sperrplatzInfo[2],
      );
      $this->db->insert('sperrplaetze', $infos);
      return;
    }
    public function delete_hoersaal($hoersaalID){
      $sql = "DROP TABLE ".$hoersaalID."";
      $query = $this->db->query($sql);
      $sql = "DELETE FROM sperrplaetze WHERE hoersaalID = '".$hoersaalID."'";
      $query = $this->db->query($sql);
      $sql = "DELETE FROM hoersaaluebersicht WHERE hoersaalID = '".$hoersaalID."'";
      $query = $this->db->query($sql);
      return;
    }
//höchste Anzahl an Plätzen pro Reihe im Hörsaal
    public function get_maxPlatzAnzahl($hoersaalID){
      $sql = "SELECT MAX(platzAnzahl) FROM ".$hoersaalID."";
      $query = $this->db->query($sql);
      $array1 = $query->row_array();
      $arr= implode($array1); //implode macht Array zu String
      return ($arr);
    }
} ?>