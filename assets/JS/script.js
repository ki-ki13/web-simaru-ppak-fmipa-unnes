//responsive
function myFunction() {
    var x = document.getElementById("Topnav");
    var y = document.getElementById("Superwrap");
    if (x.className === "topnav") {
        x.className += "responsive";
        y.className += "hilang";
    } else {
        x.className = "topnav";
        y.className = "super-wrapper";
    }
}

function uploadedFile(){
	var selectFile = document.getElementById('inputFile').value;
	var file = document.getElementById('pathFile');

	file.innerHTML = selectFile;
	console.log(selectFile)
}
