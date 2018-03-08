function printpage() {
			window.print();                                 //druck funktion
		}

  function goToNewPage() {
          var nr = document.getElementById("hoersaal");
          var selectedHs = nr.options[nr.selectedIndex].value;
          window.open(selectedHs);                                      //öffnet Hörsaal in einem neuen Fenster
          window.open('hoersaele/kontrollliste/'+selectedHs);           //öffnet Kontrolllisten in einem neuen Fenster
      }
      
  function showReihen(int){
      if(int.length == 0){
        document.getElementById('reihen').innerHTML = '';
      } else{
        //AJAX REQUEST
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){          //prüft ob serververbindung besteht
          if(this.readyState == 4 && this.status == 200){
            document.getElementById('reihen').
            innerHTML = this.responseText;
          }
        }
        //aufruf der funktion im controller hoersaele  + Übergabe der Eingabe
        xmlhttp.open("GET", "hoersaele/reihen?q="+int, true);
        xmlhttp.send();
      }
    }
  
    function sperrplaetze(int){
      if(int.length == 0){
        document.getElementById('sperrplaetze').innerHTML = '';
      } else{
        //AJAX REQUEST
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){          //prüft ob serververbindung besteht
          if(this.readyState == 4 && this.status == 200){
            document.getElementById('sperrplaetze').
            innerHTML = this.responseText;
          }
        }
        //aufruf der funktion im controller hoersaele  + Übergabe der Eingabe
        xmlhttp.open("GET", "hoersaele/sperrplaetze?q="+int, true);
        xmlhttp.send();
      }
    }

    function showMe (box) {

    var chboxs = document.getElementsByName("showSperrplaetze");
    var vis = "none";
    for(var i=0;i<chboxs.length;i++) {
        if(chboxs[i].checked){
         vis = "block";
            break;
        }
    }
    document.getElementById(box).style.display = vis;
}

    window.onscroll = function() {myFunction()};

    var navbar = document.getElementById("navigation-container");
    var sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
        }     
        else {
        navbar.classList.remove("sticky");
        }
    }
