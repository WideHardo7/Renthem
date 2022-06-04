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
        url: "GestioneAnnunci/"+idAnn,
        data:{
            'id':idAnn,
            '_token': token           
        },
        dataType:'json',
        success: fillmodal
    });
}

function fillmodal(data){
    $("tr").remove(".remove");
   $.each(data,function(key,val){       
        $("#appendme").append('<tr class="remove"><td>'+val.nome+'</td><td>'+val.cognome+'</td><td>'+val.data_nascita+'</td><td>'+val.genere+'</td><td><button onclick="openchat()">Chatta</button></td><td><button onclick="assegna()">Assegna</button></td></tr>');
    });
    $("#myModal").show();
}

function openchat(){
    window.location.replace("Chat");
}

function closemodal($id){
    $("#"+$id+"").hide();
}