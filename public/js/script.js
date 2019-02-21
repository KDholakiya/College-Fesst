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
        var formData=new FormData($('#eventUploadForm')[0]);
        $('.loader').css('display', 'block');
        $.ajax({
            type: "POST",
            url: "/addEvent",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response=='true'){
                    location.reload(); 
                }else{
                    alert("Whoops.. Event Not Uploaded Some Error Occured")
                }
            },
            complete:function (){
                $('.loader').css('display', 'none');
            },
            fail:function(response){
                alert("Whoops.. Event Not Uploaded Some Error Occured")
            }
        });
    //    $('#eventUploadForm').submit();
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