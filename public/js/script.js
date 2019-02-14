$(document).ready(function () {
    $(".card").click(function (e) {
        e.preventDefault();
        title=$("#"+$(this).attr('id')+" #title").html();
        window.location="/"+title;
    });
    $("#search").keyup(function (e) { 
        e.preventDefault();
        if(e.keyCode==13){
            var param=$(this).val();
            search(param);
        }
    });
    $("#searchBtn").click(function (e) { 
        e.preventDefault();
        var param=$("#search").val();
        search(param);
    });
});
function search(arg) {
    window.location="/Search/"+arg;
}
baguetteBox.run('.grid-gallery', { animation: 'slideIn'});