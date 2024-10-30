$(document).ready(function () {

    $("#review").click(function (event) {
        event.preventDefault();
        if (1){
            $("#warning")
                .css("display", "block")
                .animate({ opacity: 1 }, 198); 
        }

    });
    
    $("#warn-close").click(function () {
        $("#warning").animate({ opacity: 0 }, 198, function () {
            $(this).css("display", "none");
        });
    });
});