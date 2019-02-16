$(document).ready(function () {
    $(".card").click(function (e) {
        e.preventDefault();
        title=$("#"+$(this).attr('id')+" #title").html();
        window.location="/event/"+title;
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
    $('#sbmt').click(function (e) { 
        e.preventDefault();
        if( ($.trim( $('#username').val()) == "") || ($.trim($('#password').val()) == "") ) return;
        $('#form').submit();
    });
});
function search(arg) {
    arg=$.trim(arg);
    if(arg=="") return;
    window.location="/Search/"+arg;
}
baguetteBox.run('.grid-gallery', { animation: 'slideIn'});