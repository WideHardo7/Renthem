function elimina($id){
    var token = $("meta[name='csrf-token']").attr("content");
    var idFaq= $id;
    if (confirm("Sei sicuro di voler cancellare la Faq?")){
        $.ajax({
            url: "GestioneFaq/"+idFaq,
            type: 'POST',
            data:{
                'id':idFaq,
                "_token":token
                
            },
            success:function(data){
                console.log("funzaionao"+$id);
                window.location.replace(data.redirect)
            }
        });
    }
    else return false;
}

/*$(function() {
        $(document).on('click','',function(){
        var element = $(this);
        var del_id = element.attr("id");
        var info = 'id=' + del_id;
        if(confirm("Are you sure you want to delete this Record?")){
            $.ajax({
                type: "GET",
                url: "deleteCourse.php",
                data: info,
                success: function(){  } 
            });
        }
        return false;
        });
        });
*/