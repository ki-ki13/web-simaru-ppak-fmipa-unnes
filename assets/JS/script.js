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

