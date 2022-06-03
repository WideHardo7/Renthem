function elimina($id){
    var token = $("meta[name='csrf-token']").attr("content");
    var idAnn= $id;
    if (confirm("Sei sicuro di voler cancellare l' Annuncio?")){
        $.ajax({
            url: "GestioneAnnunci/"+idAnn,
            type: 'POST',
            data:{
                'id':idAnn,
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

function visint($id){
    var token = $("meta[name='csrf-token']").attr("content"); 
    var idAnn=$id;
    $.ajax({
        type: 'GET',
        url: 'GestioneAnnunci'+idAnn,
        data:{
            'id':idAnn,
            '_token': token           
        },
        dataType:'json',
        success: fillmodal
    });
}

function fillmodal(data){
    $.each(data,function(key,key,val){
        $("#appendme").append('<tr><td>'+val+'</td><td>'+val+'</td><td>''</td><td>'+val+'</td><td>''</td><td>'+val+'</td><td></tr>'):
    });
    $("#myModal").show();
}

function closemodal($id){
    $("#"+$id+"").hide();
}