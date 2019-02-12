$(document).ready(function () {
    $(".card").click(function (e) { 
        e.preventDefault();
        console.log($(this).attr('id'));
    });
});