function printpage() {
			window.print();
		}

  function goToNewPage() {
          var nr = document.getElementById("hoersaal");
          var selectedHs = nr.options[nr.selectedIndex].value;
          window.open(selectedHs); //öffnet Hörsaal
         // window.open('kontrollliste'); //öffnet Kontrollliste
          window.open('hoersaele/kontrollliste/'+selectedHs);
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
      function printpage() {
        window.print();
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
    
  Dropzone.options.mydropzone = {
    parallelUploads: 1, //nur ein upload möglich
    autoProcessQueue: true, //automatischer upload on
    maxFiles: 1, //man kann nur eine file hochladen
    acceptedFiles: ".csv", //nur .csv 
    init: function() {
      this.on("success", function() { //wenn hochgeladen, dann kann man auch weiter
        $('button:submit').attr('disabled', false);
      });
      this.on("addedfile", function(file) { //added button unter der file zum löschen der datei, falls man doch was falsches hochgeladen hat
        var removeButton = Dropzone.createElement("<button style='width: 70%; heigth: 70%;margin:auto;display:block;border-radius: 12px;border: none;margin-top: 5px;'>Remove file</button>");
        var _this = this;
        removeButton.addEventListener("click", function(e) {
          e.preventDefault();
          e.stopPropagation();
          _this.removeFile(file);
        });
        file.previewElement.appendChild(removeButton);
      });
    }
  };