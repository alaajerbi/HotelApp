var elementSearch= document.getElementById('recherche');
var elementDebut=document.getElementById('debut');
var elementRefresh=document.getElementById('refresh');

document.addEventListener('keydown',function (e) {
    if (e.keyCode==83) {
        elementDebut.style.display='none';
        elementSearch.style.display = 'block';
        elementRefresh.style.display='block';
    }

});
var x = document.getElementById("myDIV");
var butId = document.getElementById("butt");

function hideList() {

    if (x.style.display === "none") {
        butId.innerHTML="Hide List";
        x.style.display = "block";
    } else {
        butId.innerHTML="Show List";
        x.style.display = "none";
    }
}

$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});



$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});

$(document).ready(function(){
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myDIV tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

function functionReload() {
    location.reload();
}
