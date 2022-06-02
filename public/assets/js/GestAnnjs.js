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
    $("#myModal").show();    
}

function closemodal($id){
    $("#"+$id+"").hide()
}