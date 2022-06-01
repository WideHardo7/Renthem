function elimina($id){
    var token = $("meta[name='csrf-token']").attr("content");
    if (confirm("Sei sicuro di voler cancellare la Faq?")){
        $.ajax({
            url: "/GestioneFaq/"+$id,
            type: 'DELETE',
            data:{
                'id':$id,
                "_token":token
            },
            success:function(){
                console.log("funzaionao");
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