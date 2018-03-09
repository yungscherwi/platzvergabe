<?php
class Hoersaal_model extends CI_Model{
  public function __construct(){
    $this->load->database();
  }
/*------------------- Funktionen zur Entity hoersaaluebersicht----------------- */
  //Checkt ob Sperrplätze vorhanden im jeweiligen Raum
  public function get_sperrplatzCheck($raum){
    $sql = "SELECT sperrplaetze FROM hoersaaluebersicht WHERE hoersaalID = '$raum'"; //SQL-Abfrage für Platzanzahl
    $query = $this->db->query($sql);
    $array1 = $query->row_array();
    $arr= implode($array1); //implode macht Array zu String
    return ($arr);
  }
  //fragt die Anzahl der Plätze ab
  public function get_plaetze($raum){
    $sql = "SELECT plaetze FROM hoersaaluebersicht WHERE hoersaalID = '$raum'"; //SQL-Abfrage für Platzanzahl
    $query = $this->db->query($sql);
    $array1 = $query->row_array();
    $arr= implode($array1); //implode macht Array zu String
    return ($arr);
  }
  //fragt die Gesamtzahl der Plätze eines Hörsaals für eine Klausur ab
  public function get_allPlaetze(){
    $sql = "SELECT group_concat(plaetze separator ',') as 'plaetze' FROM `hoersaaluebersicht`";
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
  public function insertIntoHoersaaluebersicht($raumInfo){
    //hoersaalID wird eingefügt in die Tabelle
    $data = array(
      'hoersaalID' => $raumInfo[0]
    );
    $this->db->insert('hoersaaluebersicht', $data);
  }
  //Anzahl der Plaetze wird in Tabelle 'hoersaal' ergänzt
  public function insertIntoHoersaal($hoersaalInfo){
    $sql = "UPDATE hoersaaluebersicht SET plaetze = ".$hoersaalInfo[1]." WHERE hoersaalID = '".$hoersaalInfo[0]."'";
    $query = $this->db->query($sql);
    return;
  }
/*------------------- Funktionen zur Entity hoersaele----------------- */
  // Ausgabe von Spalte 'platzAnzahl' in einem Array
  public function get_platzAnzahl($raum){
    $sql = "SELECT group_concat(platzAnzahl separator ',') as 'platzAnzahl' FROM hoersaele WHERE hoersaalID = '$raum'";
    $query = $this->db->query($sql);
    $array1 = $query->row_array();
    $arr = explode(',',$array1['platzAnzahl']);
    $revarr = array_reverse($arr); //für richtige Ausrichtung des hörsaals
    return($revarr);
  }
  //Ausgabe von Spalte 'reihe' in einem Array
  public function get_reihe($raum){
    $sql = "SELECT group_concat(reihe separator ',') as 'reihe' FROM hoersaele WHERE hoersaalID = '$raum'";
    $query = $this->db->query($sql);
    $array1 = $query->row_array();
    $arr = explode(',',$array1['reihe']);
    $revarr = array_reverse($arr); //für richtige Ausrichtung des hörsaals
    return ($revarr);
  }
  //Insert des Hörsaals in die hoersaele Tabelle
  public function insertIntoDatabase($insertInfo){
  $infos = array(
    'platzAnzahl' => $insertInfo [1],
    'hoersaalID' => $insertInfo[0],
    'reihe' => $insertInfo[2]
  );
  $this->db->insert('hoersaele', $infos);
  return ($insertInfo);
  }
  //Einfügen ob Sperrplätze im jeweiligen Hörsaal vorhanden oder nicht
  public function updateSperrplatz($hoersaalInfo){
    //Sperrplätze auf 1 gesetzt, da vorhanden
    $sql = "UPDATE hoersaaluebersicht SET sperrplaetze = '1' WHERE hoersaalID = '".$hoersaalInfo[0]."'";
    $query = $this->db->query($sql);
    return;
  }
  //maximale Anzahl an vorhandenen Plätzen in einer Reihe im jew. Hörsaal
  public function get_maxPlatzAnzahl($hoersaalID){
    $sql = "SELECT MAX(platzAnzahl) FROM hoersaele WHERE hoersaalID = '$hoersaalID'";
    $query = $this->db->query($sql);
    $array1 = $query->row_array();
    $arr= implode($array1); //implode macht Array zu String
    return ($arr);
  }
/*------------------- Funktionen zur Entity sperrplaetze----------------- */
  public function get_sperrplatz($raum,$sperrplatzreihe,$sperrplatzcheck){
    if($sperrplatzcheck==1){
    $sql = "SELECT group_concat(sperrplatz separator ',') as 'sperrplatz' FROM `sperrplaetze` WHERE hoersaalID = '".$raum."'";
    $query = $this->db->query($sql);
    $array1 = $query->row_array();
    $arr = explode(',',$array1['sperrplatz']);
    $revarr = array_reverse($arr); //für richtige Ausrichtung des hörsaals
    //Algorithmus um die Sperrplätze pro Reihe aufsteigend und nicht absteigend sortiert zu haben
    $zwischen=[];
    $final=[];
    //solange $i kleiner als Länge von $revarr
    for($i=0;$i<count($revarr);$i++){
      //wenn das nächste Feld des Arrays nicht leer ist, dann
	     if(!empty($revarr[$i+1])){
         //wenn zwei aufeinanderfolgende Felder von $sperrplatzreihe identisch sind
	        if($sperrplatzreihe[$i]==$sperrplatzreihe[$i+1]){
            //das Feld in den $zwischen Array pushen und zum Beginn der for-schleife zurückkehren
		          array_push($zwischen,$revarr[$i]);
	         }
           // wenn aufeinanderfolgend verschiedene Reihen auftreten, dann
           else{
             //das aktuelle Feld in den $zwischen Array pushen
		           array_push($zwischen,$revarr[$i]);
               //$zwischen sortieren
		             sort($zwischen);
                 //sortierten $zwischen in $final pushen
		               array_push($final,$zwischen);
                   //$zwischen wieder zurücksetzen
		                 $zwischen=[];
	          }
	     }
       //wenn da nächste Feld leer ist, dann
	     else{
         //wenn zwei aufeinanderfolgende Felder von $sperrplatzreihe identisch sind
		       if($sperrplatzreihe[$i]==$sperrplatzreihe[$i-1]){
			          array_push($zwischen,$revarr[$i]);
			             sort($zwischen);
			                array_push($final,$zwischen);
		       }
           // wenn aufeinanderfolgend verschiedene Reihen auftreten, dann
		       else{
             //zwischen sortieren und in final pushen
		           sort($zwischen);
		           array_push($final,$zwischen);
               //zwischen zurücksetzen
		           $zwischen=[];
               //das letzte Feld des Arrays $revarr in zwischen pushen und dann in $final pushen
		           array_push($zwischen,$revarr[$i]);
		           array_push($final,$zwischen);
	         }
        }
      }
      //Merged zweidimensionalen Array $final in eindimensionalen Array $result
      $result = call_user_func_array('array_merge', $final);
      return ($result);
  }
  //wenn keine sperrplätze vorhanden, leerer return
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
    //Einfügen der jeweiligen Sperrplätze in die sperrplaetze-Tabelle
    public function insertIntoSperrplaetze($sperrplatzInfo){
      $infos = array(
        'hoersaalID' => $sperrplatzInfo[0],
        'sperrplatzreihe' => $sperrplatzInfo[1],
        'sperrplatz' => $sperrplatzInfo[2],
      );
      $this->db->insert('sperrplaetze', $infos);
      return;
    }
/*------------------ Übergreifende Funktionen ----------------------*/
    //Löschen eines Hörsaals aus allen Tabellen
    public function delete_hoersaal($hoersaalID){
      $sql = "DELETE FROM hoersaele WHERE hoersaalID = '".$hoersaalID."'";
      $query = $this->db->query($sql);
      $sql = "DELETE FROM sperrplaetze WHERE hoersaalID = '".$hoersaalID."'";
      $query = $this->db->query($sql);
      $sql = "DELETE FROM hoersaaluebersicht WHERE hoersaalID = '".$hoersaalID."'";
      $query = $this->db->query($sql);
      return;
    }
} ?>