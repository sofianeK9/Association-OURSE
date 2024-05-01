$(document).ready(function() {
    $("#heureContainer").hide();

    $(".select-heure-actualite").change(function() {
        toggleHeure();
    });
});

function toggleHeure() {
    var moment = $("#moment");
    var heureContainer = $("#heureContainer");

    if (moment.val() === "heure") {
        heureContainer.show();
    } else {
        heureContainer.hide();
    }
}
