function printpage() {
			window.print();                                 //druck funktion
		}
 //Öffnen von zwei neuen Tabs nach klicken von "Abschicken"
  function goToNewPage() {
          var nr = document.getElementById("hoersaal");
          var selectedHs = nr.options[nr.selectedIndex].value;
          window.open(selectedHs);                                      //öffnet Hörsaal in einem neuen Tab
          window.open('hoersaele/kontrollliste/'+selectedHs);           //öffnet Kontrolllisten in einem neuen Tab
      }

	//AJAX um die Anzahl der Plätze Eingabefelder zu generieren
  function showReihen(int){
      if(int.length == 0){
        document.getElementById('reihen').innerHTML = '';
      } else{
        //AJAX REQUEST
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){          //prüft ob serververbindung besteht
          if(this.readyState == 4 && this.status == 200){ //status 200: "OK"; readyState 4: "Anfrage beendet, antwort ist bereit
            document.getElementById('reihen').
            innerHTML = this.responseText;
          }
        }
        //aufruf der funktion im controller hoersaele  + Übergabe der Eingabe
        xmlhttp.open("GET", "hoersaele/reihen?q="+int, true);
        xmlhttp.send();
      }
    }

	  //AJAX um die entsprechenden Sperrplatzeingabefelder zu generieren
    function sperrplaetze(int){
      if(int.length == 0){
        document.getElementById('sperrplaetze').innerHTML = '';
      } else{
        //AJAX REQUEST
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){          //prüft ob serververbindung besteht
          if(this.readyState == 4 && this.status == 200){ //status 200: "OK"; readyState 4: "Anfrage beendet, antwort ist bereit
            document.getElementById('sperrplaetze').
            innerHTML = this.responseText;
          }
        }
        //aufruf der funktion im controller hoersaele  + Übergabe der Eingabe
        xmlhttp.open("GET", "hoersaele/sperrplaetze?q="+int, true);
        xmlhttp.send(); //Senden an View
      }
    }

		//Checkbox für Sperrplätze
    function showMe (box) {

    var chboxs = document.getElementsByName("showSperrplaetze");
    var vis = "none";
    for(var i=0;i<chboxs.length;i++) {
        if(chboxs[i].checked){ //wenn checkbox gechecked, dann
         vis = "block"; //inhalt zeigen
            break;
        }
    }
    document.getElementById(box).style.display = vis;
	}
