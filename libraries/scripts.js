function printpage() {
			window.print();
		}

function goToNewPage() {
    		var nr = document.getElementById("hoersaal");
    		var selectedHs = nr.options[nr.selectedIndex].value;

    		window.open(selectedHs); //window.location = selectedVal um es im selben Fenster zu öffnen (klappt bisher leider nicht)
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

      this.on("error", function)

    }
  };
