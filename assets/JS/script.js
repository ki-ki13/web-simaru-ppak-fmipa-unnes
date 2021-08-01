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
    $('#inputFile').change(function() {
        var i = $(this).prev('label').clone();
        var file = $('#inputFile')[0].files[0].name;
        $(this).prev('label').find('span').html(file);
      });
}
