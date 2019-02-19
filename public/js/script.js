$(document).ready(function () {
    $(".cardC").click(function (e) {
        e.preventDefault();
        title=$("#"+$(this).attr('id')+" #title").html();
        gotoGallary(title);
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
    $('#uploadEvent').click(function (e){
        console.log('form uploading');
        $('#eventUploadForm').submit();
    });
});
function gotoGallary(title){
    if(title != undefined) window.location="/event/"+title;
}
function search(arg) {
    arg=$.trim(arg);
    if(arg=="") return;
    window.location="/Search/"+arg;
}
function removeEvent($id){
    $.post("/delete", $id,
        function (data) {
            console.log(data)
        }
    );
}
baguetteBox.run('.grid-gallery', { animation: 'slideIn'});