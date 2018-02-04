function printpage() {
			window.print();
		}

function goToNewPage() {
    		var nr = document.getElementById("hoersaal");
    		var selectedHs = nr.options[nr.selectedIndex].value;

    		window.open(selectedHs); //window.location = selectedVal um es im selben Fenster zu öffnen (klappt bisher leider nicht)
}